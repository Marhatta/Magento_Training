<?php

namespace Learning\OrmDb\Block;

use Learning\OrmDb\Model\ResourceModel\ContactUs\Collection;
class ContactUs extends \Magento\Framework\View\Element\Template
{
    private $collection;
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Collection $collection,
        array $data = []
    )
    {
        $this->collection =  $collection;
        parent::__construct($context, $data);
       }

    /**
     * Get form action URL for POST contact request
     *
     * @return string
     */
    public function getFormAction()
    {
        return '/learning_ormdb/contactus/index';
    }

    public function getAllRequests(){
        return $this->collection;
    }
}