<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Seller\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Training\Seller\Api\Data\SellerInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'training_seller'
         */
        $tableName = $setup->getTable(SellerInterface::TABLE_NAME);

        $table = $installer->getConnection()->newTable(
            $installer->getTable($tableName)
        )->addColumn(
            SellerInterface::FIELD_SELLER_ID,
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Seller ID'
        )->addColumn(
            SellerInterface::FIELD_IDENTIFIER,
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,
            ['nullable' => false],
            'Seller identifier'
        )->addColumn(
            SellerInterface::FIELD_NAME,
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Seller String name'
       )->addColumn(
            SellerInterface::FIELD_CREATED_AT,
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Seller Creation Time'
        )->addColumn(
            SellerInterface::FIELD_UPDATED_AT,
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Seller Modification Time'
        )->addIndex(
            $setup->getIdxName(
                SellerInterface::TABLE_NAME,
                [SellerInterface::FIELD_IDENTIFIER],
                AdapterInterface::INDEX_TYPE_UNIQUE
            ),
            [SellerInterface::TABLE_NAME],
            ['type' => AdapterInterface::INDEX_TYPE_UNIQUE]
        )->setComment(
            'Training Seller Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
