<?php

namespace Mastering\GraphQl\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomerNotification extends AbstractDb {

    private const TABLE_NAME = 'mastering_customer_notification';

    public function _construct() {
        $this->_init(self::TABLE_NAME, "id");
    }
}
