<?php
namespace Learning\PluginDemo\Plugins;

class Add50RupeesToProduct {
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject,
                                    $productInfo,
                                    $requestInfo = null)
    {
        $productInfo['price'] += 50;

        //return array($productInfo,$requestInfo);
    }
}