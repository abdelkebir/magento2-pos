<?php
namespace Godogi\Pos\Controller\Adminhtml\Import;
use Godogi\Pos\Controller\Adminhtml\Import;
class Save extends Import
{
  /**
   * Save action
   *
   * @SuppressWarnings(PHPMD.CyclomaticComplexity)
   * @return \Magento\Framework\Controller\ResultInterface
   */
  public function execute()
  {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
      $data = $this->getRequest()->getPostValue('pos');
      echo '<pre>';
      print_r($data);
      echo '</pre>';

      echo '<pre>';
      print_r($_FILES['pos']);
      echo '</pre>';


      exit();
      return;
      $resultRedirect = $this->resultRedirectFactory->create();
      try {
          if(isset($data['file_upload']['0'])) {
              $data['file_upload'] = $data['file_upload']['0']['name'];
          }else {
              $data['file_upload'] = null;
          }
          if(isset($data['file_upload']) && !is_null($data['file_upload'])){
              $this->getCSVUploader()->moveFileFromTmp($data['file_upload']);

              $mediaPath = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath()
                   . 'pos/import/' . $data['file_upload'];

              $importProductRawData = $this->csvProcessor->getData($mediaPath);
              $count = 0;

              foreach ($importProductRawData as $rowIndex => $dataRow)
              {
                  if($rowIndex > 0)
                  {
                    echo $dataRow[0].' | '.$dataRow[1];
                      $count++;
                  }
                  echo '<br>';
              }

              $this->messageManager->addSuccess(__('Total %1 pincodes added / updated successfully.', $count));
          }else
              $this->messageManager->addError(__('CSV file not uploaded properly, please try again!'));
      } catch (\Exception $e) {
          $this->messageManager->addError($e->getMessage());
      }

      return $resultRedirect->setPath('*/*/import');
  }

  /**
   * Get image uploader
   *
   * @return \Ktpl\BannerSlider\BannerImageUploader
   *
   * @deprecated
   */
  private function getCSVUploader()
  {
      if ($this->csvUploader === null) {
          $this->csvUploader = \Magento\Framework\App\ObjectManager::getInstance()->get(
              '<VendorName>\<ModuleName>\CsvUploader'
          );
      }
      return $this->csvUploader;
  }
}
