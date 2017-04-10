<?php
/**
 * Magento 2 Training Project
 * Module Training/Helloworld
 */
namespace Training\Helloworld\Controller\Product;

use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ProductFactory;

/**
 * Action: Index/Index
 *
 * @author    Alexandre Pouey <apouey@volcom.com>
 * @copyright 2017 Volcom
 */

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ProductFactory
     */
    protected $productFactory;

    public function __construct(
        Context $context,
        ProductFactory $productFactory
    ) {
        parent::__construct($context);

        $this->productFactory = $productFactory;
    }

    /**
     * Index action
     *
     * @return $this
     */
    public function execute()
    {
        $product = $this->getAskedProduct();
        echo $product->getName();
    }

    protected function getAskedProduct()
    {
        $productId = (int) $this->getRequest()->getParam('id');
        if (!$productId) {
            return null;
        }
        
        $product = $this->productFactory->create()->load($productId);
        if(!$product) {
            return null;
        }

        return $product;

    }
}
