<?php
namespace Godogi\Pos\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Pos extends Template
{
    protected $_scopeConfig;

    public function __construct(
      \Magento\Backend\Block\Template\Context $context,
      ScopeConfigInterface $scopeConfig,
      array $data = [])
    {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getGoogleMapAPIKey()
    {
      $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
      return $this->_scopeConfig->getValue("godogipos/google_api/api_key", $storeScope);
    }
}
