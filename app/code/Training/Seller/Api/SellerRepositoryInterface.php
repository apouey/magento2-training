<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

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
    public function getById($sellerId);


    /**
     * Retrieve Seller by Identifier.
     *
     * @param int $identifier
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByIdentifier($identifier);


    /**
     * Retrieve Seller list.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Training\Seller\Api\Data\SellerSearchResultsInterface
     */
    public function getList($searchCriteria);


    /**
     * Save seller.
     *
     * @param \Training\Seller\Api\Data\SellerInterface $seller
     * @return \Training\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(SellerInterface $seller);


    /**
     * Delete seller by id
     *
     * @param int $sellerId
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($sellerId);

    /**
     * Delete seller by Identifier.
     *
     * @param string $sellerIdentifier
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     *
     */
    public function deleteByIdentifier($sellerIdentifier);
}
