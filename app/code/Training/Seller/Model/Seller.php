<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */
namespace Training\Seller\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Training\Seller\Api\Data\SellerInterface;


/**
 * Training Seller model
 *
 * @method ResourceCmsBlock _getResource()
 * @method ResourceCmsBlock getResource()
 * @method Block setStoreId(array $storeId)
 * @method array getStoreId()
 */
class Seller extends AbstractModel implements IdentityInterface, SellerInterface
{
    /**
     * Training Seller cache tag
     */
    const CACHE_TAG = 'training_seller';


    /**#@-*/
    /**
     * @var string
     */
    protected $_cacheTag = 'training_seller';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'training_seller';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Training\Seller\Model\ResourceModel\Seller');
    }


    /**
     * Get Seller ID
     *
     * @param int $id
     * @return BlockInterface
     */
    public function getSellerId()
    {
        return $this->getId();
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), self::CACHE_TAG . '_' . $this->getIdentifier()];
    }


    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return (string)$this->getData(self::FIELD_NAME);
    }

    /**
     * Get created At time
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return (string) $this->getData(self::FIELD_CREATED_AT);
    }

    /**
     * Get updated At time
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return (string) $this->getData(self::FIELD_UPDATED_AT);
    }


    /**
     * Set Seller ID
     *
     * @param int $id
     * @return BlockInterface
     */
    public function setSellerId($id)
    {
        return $this->setId((int) $value);
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::FIELD_IDENTIFIER, (string) $value);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setName($name)
    {
        return $this->setData(self::FIELD_NAME, (string) $value);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setCreatedAt($creationTime)
    {
        return $this->setData(self::FIELD_CREATED_AT, (string) $value);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \Training\Seller\Api\Data\SellerInterface
     */
    public function setUpdatedAt($updateTime)
    {
        return $this->setData(self::FIELD_UPDATED_AT, (string) $value);
    }

}
