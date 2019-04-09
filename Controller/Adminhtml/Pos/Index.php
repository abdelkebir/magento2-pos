<?php
namespace Godogi\Pos\Controller\Adminhtml\Pos;
use Godogi\Pos\Controller\Adminhtml\Pos;
class Index extends Pos
{
	public function execute()
	{
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('POSs')));
		return $resultPage;
	}
}
