<?php

namespace Mastering\GraphQl\Model\ResourceModel\CustomerNotification;

use Mastering\GraphQl\Model\ResourceModel\CustomerNotification as CustomerNotificationResource;
use Mastering\GraphQl\Model\CustomerNotification;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {

	public function _construct(){
		$this->_init(CustomerNotification::class, CustomerNotificationResource::class);
	}
}
