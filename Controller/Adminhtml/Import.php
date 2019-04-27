<?php
namespace Godogi\Pos\Controller\Adminhtml;
use Magento\Framework\App\Filesystem\DirectoryList;
class Import extends \Magento\Backend\App\Action
{
    /**
     * Image uploader
     *
     * @var \Ktpl\BannerSlider\BannerImageUploader
     */
    private $csvUploader;

    /**
     * @var \Magento\Framework\Filesystem
     */
    protected $_filesystem;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * CSV Processor
     *
     * @var \Magento\Framework\File\Csv
     */
    protected $csvProcessor;

    /**
     * @param Magento\Backend\App\Action\Context $context
     * @param Magento\Store\Model\StoreManagerInterface $storeManager
     * @param Magento\Framework\Filesystem $filesystem
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Framework\File\Csv $csvProcessor
    ) {
        $this->_filesystem = $filesystem;
        $this->_storeManager = $storeManager;
        $this->csvProcessor = $csvProcessor;
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
