<?php
namespace Learning\OrmDb\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup; 
        $installer->startSetup();
        $tableName = $installer->getTable('contact_us'); 
        // Check if the table already exists
        if ($installer->getConnection()->isTableExists($tableName) != true)
        {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Name'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Email'
                )
                ->addColumn(
                    'description',
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Description'
                )
                ->setComment('contactUs Table')
                ->setOption('type', 'InnoDB') //InnoDb and MYISAM are the storage engines of MySQL
                ->setOption('charset', 'utf8');

                $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}