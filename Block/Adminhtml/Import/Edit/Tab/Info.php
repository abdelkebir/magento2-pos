<?php
namespace Godogi\Pos\Block\Adminhtml\Import\Edit\Tab;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Directory\Model\Config\Source\Country;
class Info extends Generic implements TabInterface
{
  protected $_countryFactory;
	/**
	* @param Context $context
	* @param Registry $registry
	* @param FormFactory $formFactory
	* @param array $data
	*/
	public function __construct(
		Context $context,
		Registry $registry,
		FormFactory $formFactory,
    Country $countryFactory,
		array $data = []
	) {
    $this->_countryFactory = $countryFactory;
		parent::__construct($context, $registry, $formFactory, $data);
	}
	/**
	* Prepare form fields
	*
	* @return \Magento\Backend\Block\Widget\Form
	*/
	protected function _prepareForm()
	{
		/** @var \Magento\Framework\Data\Form $form */
		//$form = $this->_formFactory->create();
    $form = $this->_formFactory->create();
		$form->setHtmlIdPrefix('pos_');
		$form->setFieldNameSuffix('pos');
		$fieldset = $form->addFieldset(
			'base_fieldset',
			['legend' => __('General')]
		);

    $fieldset->addField(
        'file_upload',
        'file',
        [
            'name' => 'file_upload',
            'label' => __('Upload File'),
            'required' => true
        ]
    );

		$this->setForm($form);
		return parent::_prepareForm();
	}
	/**
	* Prepare label for tab
	*
	* @return string
	*/
	public function getTabLabel()
	{
		return __('Pos Import');
	}
	/**
	* Prepare title for tab
	*
	* @return string
	*/
	public function getTabTitle()
	{
		return __('Pos Import');
	}
	/**
	* {@inheritdoc}
	*/
	public function canShowTab()
	{
		return true;
	}
	/**
	* {@inheritdoc}
	*/
	public function isHidden()
	{
		return false;
	}
}
