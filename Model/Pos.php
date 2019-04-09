<?php
namespace Godogi\Pos\Model;
class Pos extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Godogi\Pos\Model\ResourceModel\Pos');
	}
}
