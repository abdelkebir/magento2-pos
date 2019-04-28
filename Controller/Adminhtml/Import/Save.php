<?php
namespace Godogi\Pos\Controller\Adminhtml\Import;
use Godogi\Pos\Controller\Adminhtml\Import;
class Save extends Import
{
    public function execute()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $count = 1;
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            if(isset($_FILES['pos']['name']['file_upload']) && !is_null($_FILES['pos']['name']['file_upload'])){
                if(isset($_FILES['pos']['type']['file_upload']) && $_FILES['pos']['type']['file_upload'] == 'text/csv'){
                    if (($handle = fopen($_FILES['pos']['tmp_name']['file_upload'], "r")) !== FALSE) {
                      $data = fgetcsv($handle, 5000, ",");
                      while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
                          $json    =   $this->getLatLong($data[0].' '.$data[1].' '.$data[2].' '.$data[3].' '.$data[7]);
                          if($json->{'status'} == 'OVER_QUERY_LIMIT'){
                              $this->messageManager->addError(__($json->{'error_message'}));
                              return $resultRedirect->setPath('*/*/edit');
                          }else{
                              $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
                              $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
                              $latlong = $lat.','.$long;
                              $map        =   explode(',' ,$latlong);
                              $mapLat     =   $map[0];
                              $mapLong    =   $map[1];
                              $_posData = array(  'title'     =>  $data[0],
                                                  'address'   =>  $data[1],
                                                  'zip'       =>  $data[2],
                                                  'city'      =>  $data[3],
                                                  'country'   =>  $data[7],
                                                  'tel'       =>  $data[4],
                                                  'date'      =>  $data[5],
                                                  'info'      =>  $data[6],
                                                  'email'     =>  $data[8],
                                                  'lat'       =>  $mapLat,
                                                  'lng'       =>  $mapLong,
                                                  'status'    =>  1
                                                );
                              $posModel = $this->_posFactory->create();
                              $posModel->setData($_posData);
                              $posModel->save();
                          }
                      }
                      fclose($handle);
                    }
                    $this->messageManager->addSuccess(__('Total %1 POS added / updated successfully.', $count));
                } else{
                    $this->messageManager->addError(__('File format is not correct, use a CSV format!'));
                }
            } else{
                $this->messageManager->addError(__('CSV file not uploaded properly, please try again!'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        return $resultRedirect->setPath('*/*/edit');
    }
    public function getLatLong($address){
        $apiKey = $this->getScopeConfigValue('godogipos/google_api/api_key');
        $address = str_replace(" ", "+", $address);
        $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=$apiKey");
        $json = json_decode($json);
        return $json;
    }
}
