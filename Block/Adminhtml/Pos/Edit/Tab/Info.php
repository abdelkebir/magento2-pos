<?php
namespace Godogi\Pos\Block\Adminhtml\Pos\Edit\Tab;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Directory\Model\Config\Source\Country;
class Info extends Generic implements TabInterface
{
  protected $_countryFactory;
	/**
	* @param Context $context
	* @param Registry $registry
	* @param FormFactory $formFactory
	* @param array $data
	*/
	public function __construct(
		Context $context,
		Registry $registry,
		FormFactory $formFactory,
    Country $countryFactory,
		array $data = []
	) {
    $this->_countryFactory = $countryFactory;
		parent::__construct($context, $registry, $formFactory, $data);
	}
	/**
	* Prepare form fields
	*
	* @return \Magento\Backend\Block\Widget\Form
	*/
	protected function _prepareForm()
	{
		/** @var $model \Godogi\Pos\Model\Pos */
		$model = $this->_coreRegistry->registry('godogi_pos_pos');
		/** @var \Magento\Framework\Data\Form $form */
		$form = $this->_formFactory->create();
		$form->setHtmlIdPrefix('pos_');
		$form->setFieldNameSuffix('pos');
		$fieldset = $form->addFieldset(
			'base_fieldset',
			['legend' => __('General')]
		);
		if ($model->getId()) {
			$fieldset->addField(
				'pos_id',
				'hidden',
				['name' => 'pos_id']
			);
		}
    $fieldset->addField(
			'title',
			'text',
			[
				'name' => 'title',
				'label' => __('Title'),
				'required' => true
			]
		);
    $fieldset->addField(
        'status',
        'select',
        [
            'name' => 'status',
            'label' => __('Status'),
            'title' => __('Status'),
            'values' => [ 1 => 'Enabled', 0 => 'Disabled'],
            'required' => true
        ]
    );
    $fieldset_two = $form->addFieldset(
			'address_fieldset',
			['legend' => __('Address')]
		);
    $optionsc = $this->_countryFactory->toOptionArray();
    $country = $fieldset_two->addField(
        'country',
        'select',
        [
            'name' => 'country',
            'label' => __('Country'),
            'title' => __('Country'),
            'values' => $optionsc,
            'required' => true
        ]
    );
		$fieldset_two->addField(
			'city',
			'text',
			[
				'name' => 'city',
				'label' => __('City'),
				'required' => true
			]
		);
    $fieldset_two->addField(
			'zip',
			'text',
			[
				'name' => 'zip',
				'label' => __('Zip'),
				'required' => true
			]
		);
    $fieldset_two->addField(
			'address',
			'text',
			[
				'name' => 'address',
				'label' => __('Address'),
				'required' => true
			]
		);

    $fieldset_three = $form->addFieldset(
			'info_fieldset',
			['legend' => __('More Details')]
		);
    $fieldset_three->addField(
			'tel',
			'text',
			[
				'name' => 'lat',
				'label' => __('Tel'),
				'required' => false
			]
		);
    $fieldset_three->addField(
			'email',
			'text',
			[
				'name' => 'lat',
				'label' => __('Email'),
				'required' => false
			]
		);
    $fieldset_three->addField(
			'date',
			'text',
			[
				'name' => 'lat',
				'label' => __('Date'),
				'required' => false
			]
		);
    $fieldset_three->addField(
			'info',
			'text',
			[
				'name' => 'lat',
				'label' => __('More Info'),
				'required' => false
			]
		);

    $fieldset_four = $form->addFieldset(
			'latlng_fieldset',
			['legend' => __('Latitude & Longitude')]
		);
    $fieldset_four->addField(
			'lat',
			'text',
			[
				'name' => 'lat',
				'label' => __('Latitude'),
				'required' => true
			]
		);
    $lng = $fieldset_four->addField(
			'lng',
			'text',
			[
				'name' => 'lng',
				'label' => __('Longitude'),
				'required' => true
			]
		);
    $lng->setAfterElementHtml('
        <div class="admin__field-control control" style="margin-top:40px;">
            <button id="map-popup" title="Open" type="button" class="action-default scalable primary ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
                <span class="ui-button-text">
                    <span>'. __('Generate from map') .'</span>
                </span>
            </button>
        </div>
    ');


		$data = $model->getData();
		$form->setValues($data);
		$this->setForm($form);
		return parent::_prepareForm();
	}
	/**
	* Prepare label for tab
	*
	* @return string
	*/
	public function getTabLabel()
	{
		return __('Pos Info');
	}
	/**
	* Prepare title for tab
	*
	* @return string
	*/
	public function getTabTitle()
	{
		return __('Pos Info');
	}
	/**
	* {@inheritdoc}
	*/
	public function canShowTab()
	{
		return true;
	}
	/**
	* {@inheritdoc}
	*/
	public function isHidden()
	{
		return false;
	}
}
