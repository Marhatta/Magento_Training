<?php
 
namespace Learning\OrmDb\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class UpgradeData implements UpgradeDataInterface
{
 
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.4') < 0) {
            $tableName = $setup->getTable('contact_us');
            //Check for the existence of the table
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $data = [
                    [
                        'name' => 'How to Speed Up Magento 2 Website',
                        'email' => 'dev_vishal@gmail.com',
                        'description' => 'Some random description',
                    ],
                    [
                        'name' => 'Optimize SEO for Magento Website',
                        'email' => 'dev_rahul@gmail.com',
                        'description' => 'Some random description',
                    ],
                    [
                        'name' => 'Top 10 eCommerce Websites',
                        'email' => 'dev_anmol@gmail.com',
                        'description' => 'Some random long long  description',
                    ],
                ];
                foreach ($data as $item) {
                    //Insert data
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }
        $setup->endSetup();
    }
}