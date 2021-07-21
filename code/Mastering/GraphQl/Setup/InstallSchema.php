<?php
namespace Mastering\GraphQL\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;

        $installer->startSetup();
        $table  = $installer->getConnection()
            ->newTable($installer->getTable('mastering_customer_notification'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'nullable'=>false, 'primary'=>true],
                'Customer ID'
                )
            ->addColumn(
                'firstname',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Customer Firstname'
            )->addColumn(
                'lastname',
                Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Customer lastname'
            )->addColumn(
                'email',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Customer email'
            );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
