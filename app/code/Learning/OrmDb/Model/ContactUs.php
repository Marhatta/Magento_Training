<?php

namespace Learning\OrmDb\Model;

class ContactUs extends \Magento\Framework\Model\AbstractModel{
    protected function _construct(){
        $this->_init("Learning\OrmDb\Model\ResourceModel\ContactUs");
    }
}