<?php
namespace Godogi\Pos\Block\Adminhtml\Import\Edit;
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
		$this->setId('edit_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(__('Pos Information'));
	}
}
