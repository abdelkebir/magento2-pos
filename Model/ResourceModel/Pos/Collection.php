<?php
namespace Godogi\Pos\Model\ResourceModel\Pos;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Godogi\Pos\Model\Pos', 'Godogi\Pos\Model\ResourceModel\Pos');
	}
}
