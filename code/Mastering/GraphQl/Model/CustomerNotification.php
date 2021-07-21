<?php
namespace Mastering\GraphQl\Model;

use Magento\Framework\Model\AbstractExtensibleModel;

class CustomerNotification extends AbstractExtensibleModel {

    public function _construct(){
		$this->_init(Mastering\GraphQl\Model\ResourceModel\CustomerNotification::class);
	}
}
