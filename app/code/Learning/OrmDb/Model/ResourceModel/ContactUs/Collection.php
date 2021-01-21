<?php
namespace Learning\OrmDb\Model\ResourceModel\ContactUs;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'contact_us_collection';
	protected $_eventObject = 'contact_us_collection';

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
