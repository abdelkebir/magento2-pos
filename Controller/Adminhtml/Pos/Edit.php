<?php
namespace Godogi\Pos\Controller\Adminhtml\Pos;
use Godogi\Pos\Controller\Adminhtml\Pos;
class Edit extends Pos
{
	/**
	* @return void
	*/
	public function execute()
	{
		$posId = $this->getRequest()->getParam('pos_id');
		/** @var \Godogi\Pos\Model\Pos $model */
		$model = $this->_posFactory->create();
		if ($posId) {
			$model->load($posId);
			if (!$model->getId()) {
				$this->messageManager->addError(__('This pos no longer exists.'));
				$this->_redirect('*/*/');
				return;
			}
		}
		// Restore previously entered form data from session
		$data = $this->_session->getPosData(true);
		if (!empty($data)) {
			$model->setData($data);
		}
		$this->_coreRegistry->register('godogi_pos_pos', $model);
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Godogi_Pos::content_pos');
		$resultPage->getConfig()->getTitle()->prepend(__('Pos'));
		return $resultPage;
	}
}
