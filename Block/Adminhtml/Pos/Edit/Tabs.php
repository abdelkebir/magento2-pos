<?php
namespace Godogi\Pos\Block\Adminhtml\Pos\Edit;
use Magento\Backend\Block\Widget\Tabs as WidgetTabs;
class Tabs extends WidgetTabs
{
	/**
	* Class constructor
	*
	* @return void
	*/
	protected function _construct()
	{
		parent::_construct();
		$this->setId('pos_edit_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(__('Pos Information'));
	}
	/**
	* @return $this
	*/
	protected function _beforeToHtml()
	{
		$this->addTab(
			'pos_info',
			[
				'label' => __('General'),
				'title' => __('General'),
				'content' => $this->getLayout()->createBlock('Godogi\Pos\Block\Adminhtml\Pos\Edit\Tab\Info')->toHtml(),
				'active' => true
			]
		);
		return parent::_beforeToHtml();
	}
}
