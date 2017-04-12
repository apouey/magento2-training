<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Controller\Seller;

use Magento\Framework\App\Action\Context;
use Training\Seller\Api\SellerRepositoryInterface;


/**
 * Action: Seller/Index
 *
 * @author    Alexandre Pouey <apouey@volcom.com>
 * @copyright 2017 Volcom
 */

class Index extends \Magento\Framework\App\Action\Action
{

    protected $sellerRepositoryInterface;

    /**
     * Index constructor.
     * @param Context $context
     * @param sellerRepositoryInterface $sellerRepositoryInterface
     */
    public function __construct(
        Context $context,
        sellerRepositoryInterface $sellerRepositoryInterface
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