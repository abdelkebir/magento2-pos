<?php
namespace Godogi\Pos\Model\ResourceModel;
class Pos extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	){
		parent::__construct($context);
	}
	protected function _construct()
	{
		$this->_init('godogi_pos', 'pos_id');
	}
}
