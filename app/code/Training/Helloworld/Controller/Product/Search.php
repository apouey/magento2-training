<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 11/04/17
 * Time: 14:10
 */

namespace Training\Helloworld\Controller\Product;


use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SortOrderBuilder;


//use Magento\Framework\App\ResponseInterface;

class Search extends \Magento\Framework\App\Action\Action
{

    protected $productRepositoryInterface;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $sortOrderBuilder;

    /**
     * Search constructor.
     * @param Context $context
     * @param ProductRepositoryInterface $productRepositoryInterface
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     */
    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepositoryInterface,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        SortOrderBuilder $sortOrderBuilder
    ) {
        parent::__construct($context);

        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;

    }


    /**
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
    public function getProductList()
    {
        $nameFilter[] = $this->filterBuilder
            ->setField('name')
            ->setConditionType('like')
            ->setValue('%bruno%')
            ->create();

        $descriptionFilter[] = $this->filterBuilder
            ->setField('description')
            ->setConditionType('like')
            ->setValue('%comfortable%')
            ->create();

        $order = $this->sortOrderBuilder
            ->setField('name')
            ->setDescendingDirection()
            ->create();

        $criteriaBuilder = $this->searchCriteriaBuilder
            ->addFilters($nameFilter)
            ->addFilters($descriptionFilter)
            ->addSortOrder($order)
            ->setPageSize(6)
            ->setCurrentPage(1)
            ->create();

        return $this->productRepositoryInterface->getList($criteriaBuilder)->getItems();
    }


    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $products = $this->getProductList();

        foreach($products as $product)
        {
            $this->getResponse()->appendBody($product->getName() . '<br/>');
        }

    }
}
