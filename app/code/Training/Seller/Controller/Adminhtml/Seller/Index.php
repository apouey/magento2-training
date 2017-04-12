<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Controller\Adminhtml\Seller;

use Magento\Backend\App\Action\Context;
use Training\Seller\Api\SellerRepositoryInterface;

class Index extends \Magento\Backend\App\Action
{

    protected $sellerRepositoryInterface;

    /**
     * Index constructor.
     * @param Context $context
     * @param sellerRepositoryInterface $sellerRepositoryInterface
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        SellerRepositoryInterface $sellerRepositoryInterface
    ) {
        parent::__construct($context);

        $this->sellerRepositoryInterface = $sellerRepositoryInterface;
    }

    /**
     *
     */
    public function execute()
    {
        $result = $this->sellerRepositoryInterface->getList();

        foreach ($result->getItems() as $seller) {
            echo $seller->getIdentifier() . $seller->getName().'<br/>';
        }
    }

}
