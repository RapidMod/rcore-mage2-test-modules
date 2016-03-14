<?php
namespace Rcore\Test\Controller\Adminhtml\Product;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
class Index extends Action{
	const ADMIN_RESOURCE = 'Rcore_Reports::overview';
	protected $pageFactory;

	public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		if(!class_exists("Rcore")){
			$path = array(
				$_SERVER['DOCUMENT_ROOT'],
				"app",
				"code",
				"Rcore",
				"Library",
				"Rcore.php"
			);
			require (implode(DIRECTORY_SEPARATOR,$path));
			\Rcore::execute("",array("no_route"=>1));
			new \RcoreMageMysqlInit();
		}

		parent::__construct($context);
		return $this->pageFactory = $pageFactory;

	}

	public function execute(){
		$page_object = $this->pageFactory->create();
		$page_object->getConfig()->getTitle()->prepend(__("Test Product Page"));
		return $page_object;
	}
}
?>