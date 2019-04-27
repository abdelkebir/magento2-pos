<?php
namespace Godogi\Pos\Block\Adminhtml\Import\Import;
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
		$this->setId('pos_import_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(__('Pos Information'));
	}
}
