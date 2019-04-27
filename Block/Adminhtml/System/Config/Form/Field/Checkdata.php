<?php
namespace Godogi\Pos\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Checkdata extends Field
{
    protected $_scopeConfig;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    protected function _getElementHtml(AbstractElement $element)
    {
      $html ='<button id="map-popup" title="Open" type="button" style="display:none" class="action-default scalable primary ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
                <span class="ui-button-text">
                    <span>'. __('Check Data') .'</span>
                </span>
            </button>';
      $element->setData('text', $html);
      return parent::_getElementHtml($element);
    }
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _renderScopeLabel(AbstractElement $element)
    {
        return '';
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _renderInheritCheckbox(AbstractElement $element)
    {
        return '';
    }
}
