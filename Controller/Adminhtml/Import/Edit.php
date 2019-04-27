<?php
namespace Godogi\Pos\Controller\Adminhtml\Import;
use Godogi\Pos\Controller\Adminhtml\Pos;
class Edit extends Pos
{
	/**
	* @return void
	*/
	public function execute()
	{

		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Godogi_Pos::content_pos');
		$resultPage->getConfig()->getTitle()->prepend(__('Pos Import'));
		return $resultPage;
	}
}
