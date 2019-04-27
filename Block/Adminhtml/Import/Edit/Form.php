<?php
namespace Godogi\Pos\Block\Adminhtml\Import\Edit;
use Magento\Backend\Block\Widget\Form\Generic;
class Form extends Generic
{
	/**
	* @return $this
	*/
	protected function _prepareForm()
	{
		/** @var \Magento\Framework\Data\Form $form */

    $form = $this->_formFactory->create(
        [
            'data' => [
                'id'      => 'import_edit_form',
                'action'  => $this->getUrl('*/*/save'),
                'method'  => 'post',
                'enctype' => 'multipart/form-data'
            ]
        ]
    );
    $form->setUseContainer(true);
    $this->setForm($form);

    return parent::_prepareForm();
	}
}