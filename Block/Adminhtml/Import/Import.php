<?php
namespace Godogi\Pos\Block\Adminhtml\Import;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
class Import extends Container
{
	/**
	* Core registry
	*
	* @var \Magento\Framework\Registry
	*/
	protected $_coreRegistry = null;
	/**
	* @param Context $context
	* @param Registry $registry
	* @param array $data
	*/
	public function __construct(
		Context $context,
		Registry $registry,
		array $data = []
	) {
		$this->_coreRegistry = $registry;
		parent::__construct($context, $data);
	}
	/**
	* Class constructor
	*
	* @return void
	*/
	protected function _construct()
	{
		$this->_objectId = 'id';
		$this->_controller = 'adminhtml_pos';
		$this->_blockGroup = 'Godogi_Pos';
		parent::_construct();
		$this->buttonList->update('save', 'label', __('Import'));
		$this->buttonList->update('delete', 'label', __('Delete'));
	}
	/**
	* Retrieve text for header element depending on loaded news
	*
	* @return string
	*/
	public function getHeaderText()
	{
		$posRegistry = $this->_coreRegistry->registry('godogi_pos_import');
		if ($posRegistry->getId()) {
			$posTitle = $this->escapeHtml($posRegistry->getTitle());
			return __("Edit Pos '%1'", $posTitle);
		} else {
			return __('Add Pos');
		}
	}
}
