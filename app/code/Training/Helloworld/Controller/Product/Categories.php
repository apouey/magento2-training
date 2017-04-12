<?php
/**
 * Magento 2 Training Project
 * Module Training/Helloworld
 */
namespace Training\Helloworld\Controller\Product;

use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;


/**
 * Action: Categories/Index
 *
 * @author    Alexandre Pouey <apouey@volcom.com>
 * @copyright 2017 Volcom
 */

class Categories extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ProductCollectionFactory
     * @var CategoryCollectionFactory
     */
    protected $productCollectionFactory;

    protected $categoryCollectionFactory;

    /**
     * Categories constructor.
     * @param Context $context
     * @param ProductCollectionFactory $productCollection
     * @param CategoryCollectionFactory $categoryCollection
     */
    public function __construct(
        Context $context,
        ProductCollectionFactory $productCollection,
        CategoryCollectionFactory $categoryCollection
    ) {
        parent::__construct($context);

        $this->productCollectionFactory = $productCollection;
        $this->categoryCollectionFactory = $categoryCollection;
    }



    /**
     * Execute the action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection */
        $productCollection = $this->productCollectionFactory->create();
        $productCollection
            ->addAttributeToFilter('name', array('like' => '%bag%'))
            ->addCategoryIds()
            ->load();

        $categoryIds = array();
        foreach ($productCollection->getItems() as $product) {
            /** @var \Magento\Catalog\Model\Product $product */
            $categoryIds = array_merge($categoryIds, $product->getCategoryIds());
        }
        $categoryIds = array_unique($categoryIds);

        /** @var \Magento\Catalog\Model\ResourceModel\Category\Collection $catCollection */
        $catCollection = $this->categoryCollectionFactory->create();
        $catCollection
            ->addAttributeToFilter('entity_id', array('in' => $categoryIds))
            ->addAttributeToSelect('name')
            ->load();

        $html = '<ul>';
        foreach ($productCollection->getItems() as $product) {
            $html.= '<li>';
            $html.= $product->getId().' => '.$product->getSku().' => '.$product->getName();
            $html.= '<ul>';
            foreach ($product->getCategoryIds() as $categoryId) {
                /** @var \Magento\Catalog\Model\Category $category */
                $category = $catCollection->getItemById($categoryId);
                $html.= '<li>'.$categoryId.' => '.$category->getName().'</li>';
            }
            $html.= '</ul>';
            $html.= '</li>';
        }
        $html.= '</ul>';

        $this->getResponse()->appendBody($html);
    }
}
