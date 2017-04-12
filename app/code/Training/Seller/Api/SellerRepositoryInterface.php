<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Training\Seller\Api\Data\SellerInterface;

/**
 * Seller interface.
 * @api
 */
interface SellerRepositoryInterface
{
    /**
     * Retrieve Seller by Id.
     *
     * @param int $sellerId
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($objectId);


    /**
     * Retrieve Seller by Identifier.
     *
     * @param int $identifier
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByIdentifier($objectIdentifier);


    /**
     * Retrieve Seller list.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Training\Seller\Api\Data\SellerSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);


    /**
     * Save seller.
     *
     * @param \Training\Seller\Api\Data\SellerInterface $seller
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(SellerInterface $object);


    /**
     * Delete seller by id
     *
     * @param int $sellerId
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($objectId);

    /**
     * Delete seller by Identifier.
     *
     * @param string $sellerIdentifier
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     *
     */
    public function deleteByIdentifier($objectIdentifier);
}
