<?php
namespace Godogi\Pos\Controller\Adminhtml\Pos;
use Godogi\Pos\Controller\Adminhtml\Pos;
class Save extends Pos
{
	/**
	* @return void
	*/
	public function execute()
	{
		$isPost = $this->getRequest()->getPost();
		if ($isPost) {
			$posModel = $this->_posFactory->create();
			$posId = $this->getRequest()->getParam('pos_id');
			if ($posId) {
				$posModel->load($posId);
			}
			$formData = $this->getRequest()->getParam('pos');
			$posModel->setData($formData);

			try {
				// Save news
				$posModel->save();
				// Display success message
				$this->messageManager->addSuccess(__('The pos has been saved.'));
				// Check if 'Save and Continue'
				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', ['pos_id' => $posModel->getPosId(), '_current' => true]);
					return;
				}
				// Go to grid page
				$this->_redirect('*/*/');
				return;
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
			}
			$this->_getSession()->setFormData($formData);
			$this->_redirect('*/*/edit', ['pos_id' => $posId]);
		}
	}
}
