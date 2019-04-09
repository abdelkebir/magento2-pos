<?php
namespace Godogi\Pos\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;
use Godogi\Pos\Model\PosFactory;
use Godogi\Pos\Model\ResourceModel\Pos\CollectionFactory;
class Pos extends Action
{
	/**
	* @var Filter
	*/
	protected $_filter;
	/**
	* Core registry
	*
	* @var Registry
	*/
	protected $_coreRegistry;
	/**
	* Result page factory
	*
	* @var PageFactory
	*/
	protected $_resultPageFactory;
	/**
	* Pos model factory
	*
	* @var PosFactory
	*/
	protected $_posFactory;
	/**
	* @var CollectionFactory
	*/
	protected $_collectionFactory;

	/**
	* @param Context $context
	* @param Registry $coreRegistry
	* @param PageFactory $resultPageFactory
	* @param PosFactory $posFactory
	* @param CollectionFactory $collectionFactory
	* @param Filter $filter
	*/
	public function __construct(
		Context $context,
		Registry $coreRegistry,
		PageFactory $resultPageFactory,
		PosFactory $posFactory,
		CollectionFactory $collectionFactory,
		Filter $filter
	) {
		parent::__construct($context);
		$this->_coreRegistry = $coreRegistry;
		$this->_resultPageFactory = $resultPageFactory;
		$this->_posFactory = $posFactory;
		$this->_collectionFactory = $collectionFactory;
		$this->_filter = $filter;
	}


	public function execute()
	{
		return true;
	}


	/**
	* Pos access rights checking
	*
	* @return bool
	*/
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Godogi_Pos::content_pos');
	}
}
