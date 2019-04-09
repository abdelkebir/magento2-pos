<?php
namespace Godogi\Pos\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Map extends \Magento\Framework\View\Element\Template
{
		protected $_scopeConfig;
		public function __construct(
				\Magento\Framework\View\Element\Template\Context $context,
				ScopeConfigInterface $scopeConfig)
		{
				$this->_scopeConfig = $scopeConfig;
				parent::__construct($context);
		}

		public function getAjaxUrl(){
				return $this->getUrl('pos/index/points');
		}
		/**
     * @return string
     */
    public function getGoogleMapAPIKey()
    {
	      $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
	      return $this->_scopeConfig->getValue("godogipos/google_api/api_key", $storeScope);
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
