<?php
namespace Learning\OrmDb\Model\ResourceModel\ContactUs;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Learning\OrmDb\Model\ContactUs', 'Learning\OrmDb\Model\ResourceModel\ContactUs');
	}

}
