<?php

namespace Learning\OrmDb\Block;

class ContactUs extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
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
}