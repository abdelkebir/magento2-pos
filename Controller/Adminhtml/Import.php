<?php
namespace Godogi\Pos\Controller\Adminhtml;

use Magento\Framework\View\Result\PageFactory;
use Godogi\Pos\Model\PosFactory;

class Import extends \Magento\Backend\App\Action
{

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


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        PageFactory $resultPageFactory,
        PosFactory $posFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_posFactory = $posFactory;
        parent::__construct($context);
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
