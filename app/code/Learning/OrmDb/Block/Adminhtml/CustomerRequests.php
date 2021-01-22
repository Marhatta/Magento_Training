<?php
namespace Learning\OrmDb\Block\Adminhtml;

class CustomerRequests extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_customerrequests';
		$this->_blockGroup = 'Learning_OrmDb';
		$this->_headerText = __('Customer Requests');
		parent::_construct();
		// must be placed after the parent::__construct();
        $this->buttonList->remove('add');
	}
}