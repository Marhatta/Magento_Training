<?php
namespace Learning\OrmDb\Block\Adminhtml;

class CustomerRequests extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		parent::_construct();
		// must be placed after the parent::__construct();
        $this->buttonList->remove('add');
	}
}