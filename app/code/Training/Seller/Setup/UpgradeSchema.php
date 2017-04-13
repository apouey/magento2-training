<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Seller\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Training\Seller\Model\ResourceModel\Setup;
use Magento\Framework\DB\Ddl\Table;

use Training\Seller\Api\Data\SellerInterface;


/**
 * Upgrade Seller module DB schema
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addDescriptionField($setup);
        }
        $setup->endSetup();
    }

    /**
     * Add meta title
     *
     * @param SchemaSetupInterface $setup
     * @return $this
     */
    protected function addDescriptionField(SchemaSetupInterface $setup)
    {
        $tableName = $setup->getTable(SellerInterface::TABLE_NAME);

        $setup->getConnection()->addColumn(
            $tableName,
            SellerInterface::FIELD_DESCRIPTION,
            array(
                'type'     => Table::TYPE_TEXT,
                'length'   => null,
                'nullable' => true,
                'comment'  => 'Seller Description'
            )
        );
    }
}