<?php
namespace Godogi\Pos\Controller\Adminhtml\Pos;
use Godogi\Pos\Controller\Adminhtml\Pos;
class Delete extends Pos
{
	/**
	* @return void
	*/
	public function execute()
	{
		$posId = (int) $this->getRequest()->getParam('pos_id');
		if ($posId) {
			/** @var $posModel \Godogi\Pos\Model\Pos */
			$posModel = $this->_posFactory->create();
			$posModel->load($posId);
			// Check this pos exists or not
			if (!$posModel->getPosId()) {
				$this->messageManager->addError(__('This pos no longer exists.'));
			} else {
				try {
					// Delete pos
					$posModel->delete();
					$this->messageManager->addSuccess(__('The pos has been deleted.'));
					// Redirect to grid page
					$this->_redirect('*/*/');
					return;
				} catch (\Exception $e) {
					$this->messageManager->addError($e->getMessage());
					$this->_redirect('*/*/edit', ['pos_id' => $posModel->getPosId()]);
				}
			}
		}
	}
}
