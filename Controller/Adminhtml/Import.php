<?php
namespace Godogi\Pos\Controller\Adminhtml;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
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

    protected $_scopeConfig;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        PageFactory $resultPageFactory,
        PosFactory $posFactory,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_posFactory = $posFactory;
        $this->_scopeConfig = $scopeConfig;
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
    /**
     * @return string
     */
    public function getScopeConfigValue($key)
    {
				$storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
	      return $this->_scopeConfig->getValue($key, $storeScope);
    }
}
