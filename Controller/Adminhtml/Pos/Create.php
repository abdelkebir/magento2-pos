<?php
namespace Godogi\Pos\Controller\Adminhtml\Pos;
use Godogi\Pos\Controller\Adminhtml\Pos;
class Create extends Pos
{
	public function execute()
	{
		$this->_forward('edit');
	}
}
