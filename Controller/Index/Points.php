<?php
namespace Godogi\Pos\Controller\Index;
use Magento\Framework\App\Action\Context;
class Points extends \Magento\Framework\App\Action\Action
{
    protected $_countryFactory;
    protected $_resultJsonFactory;
    protected $_posFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Godogi\Pos\Model\PosFactory $posFactory,
        \Magento\Directory\Model\CountryFactory $countryFactory)
    {
        $this->_countryFactory = $countryFactory;
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_posFactory = $posFactory;
        parent::__construct($context);
    }
    public function execute()
    {

        $positions = [];
        $pos = $this->_posFactory->create();
        $collection = $pos->getCollection();
        if(null !== $this->getRequest()->getPostValue('posr')){
            $posr = $this->getRequest()->getPostValue('posr');
            if($posr != ''){
                if(is_numeric ( $posr )){
                    $collection->addFieldToFilter('zip', array('like' => '%'.$posr.'%'));
                }else{
                    $collection->addFieldToFilter('city', array('like' => '%'.$posr.'%'));
                }
            }
        }
        foreach($collection as $item){
            $positions[]=['title' => $item->getTitle(),
                          'address' => $item->getAddress(),
                          'zip' => $item->getZip(),
                          'city' => $item->getCity(),
                          'country' => $this->getCountryname($item->getCountry()),
                          'lat' => $item->getLat(),
                          'lng' => $item->getLng()];
        }
        $result = $this->_resultJsonFactory->create();
        if ($this->getRequest()->isAjax())
        {
            return $result->setData($positions);
        }else {
            return $result->setData(['error' => 'You don\'t have permission to view results']);
        }
    }
		public function getCountryname($countryCode){
        $country = $this->_countryFactory->create()->loadByCode($countryCode);
        return $country->getName();
    }
}
