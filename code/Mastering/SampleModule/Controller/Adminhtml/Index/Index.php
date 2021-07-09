<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;

class Index extends Action {

	public function execute() {
		// /** 
		//  * @var \Magento\Framework\Controller\Result\Raw $result
		//  */
		// $result = $this->ResultFactory->create(ResultFactory::TYPE_RAW);
		// $result->setContent('Hello admins!');
		// return $result;
		echo 'Hello admin';
		exit;
	}
}