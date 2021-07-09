<?php

namespace Mastering\SampleModule\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\Result\Raw;

class Index extends Action {

	public function execute() {
		// /** 
		//  * @var \Magento\Framework\Controller\Result\Raw $result
		//  */
		// $result = $this->ResultFactory->create(ResultFactory::TYPE_RAW);
		// $result->setContent('Hello world');
		// return $result;
		// echo "Hello world";
		// exit;

		return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
	}
}