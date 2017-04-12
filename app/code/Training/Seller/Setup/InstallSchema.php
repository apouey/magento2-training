<?php
/**
 * Magento 2 Training Project
 * Module Training/Seller
 */

namespace Training\Seller\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Training\Seller\Api\Data\SellerInterface;

/**
 * Install Schema
 *
 * @author    Laurent MINGUET <lamin@smile.fr>
 * @copyright 2016 Smile
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface   $setup   Setup
     * @param ModuleContextInterface $context Context
     *
     * @return void
     * @SuppressWarnings("PMD.UnusedFormalParameter")
     * @SuppressWarnings("PMD.ExcessiveMethodLength")
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = $setup->getTable(SellerInterface::TABLE_NAME);

        $table = $setup->getConnection()
            ->newTable($setup->getTable($tableName))
            ->addColumn(
                SellerInterface::FIELD_SELLER_ID,
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Seller ID'
            )
            ->addColumn(
                SellerInterface::FIELD_IDENTIFIER,
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Seller identifier'
            )
            ->addColumn(
                SellerInterface::FIELD_NAME,
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Seller String name'
           )
            ->addColumn(
                SellerInterface::FIELD_CREATED_AT,
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Seller Creation Time'
            )
            ->addColumn(
                SellerInterface::FIELD_UPDATED_AT,
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Seller Modification Time'
            )
            ->addIndex(
                $setup->getIdxName(
                    SellerInterface::TABLE_NAME,
                    [SellerInterface::FIELD_IDENTIFIER],
                    AdapterInterface::INDEX_TYPE_UNIQUE
                ),
                [SellerInterface::FIELD_IDENTIFIER],
                ['type' => AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->setComment(
                'Training Seller Table'
            );


        $setup->startSetup();

        $setup->getConnection()->createTable($table);

        $setup->endSetup();

    }
}
