<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Api\Data;

/**
 * Seller Api interface.
 * @api
 */
interface SellerInterface
{

    /**
     * Name of Mysql Name
     */
    const TABLE_NAME = 'training_seller';

    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const FIELD_SELLER_ID = 'seller_id';
    const FIELD_IDENTIFIER = 'identifier';
    const FIELD_NAME = 'name';
    const FIELD_CREATED_AT = 'created_at';
    const FIELD_UPDATED_AT = 'updated_at';

    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getSellerId();

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setSellerId($id);

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setIdentifier($identifier);

    /**
     * Set name
     *
     * @param string $name
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setName($name);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setCreatedAt($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setUpdatedAt($updateTime);
}
