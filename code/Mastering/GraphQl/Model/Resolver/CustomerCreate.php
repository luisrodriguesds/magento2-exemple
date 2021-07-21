<?php

declare(strict_types=1);

namespace Mastering\GraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Customer\Model\CustomerFactory;

use Mastering\GraphQl\Model\ResourceModel\CustomerNotification\Collection;
use Mastering\GraphQl\Model\ResourceModel\CustomerNotification\CollectionFactory;


class CustomerCreate implements ResolverInterface {


    /**

     * @param ValueFactory $valueFactory

     * @param CustomerFactory $customerFactory

     */
    public function __construct(
        ValueFactory $valueFactory,
        CollectionFactory $customerNotificationFactory
    ) {
        $this->valueFactory = $valueFactory;
        $this->customerNotificationFactory = $customerNotificationFactory;
    }


    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)  {
        // print_r(array(0 => $args, 1 => count($args)));
        // print_r($this->customerNotificationCollectionFactory->getList());
        // $customerNotificationModel = $this->customerNotificationRepository->create();
        // $customerNotificationModel->addData([
        //     "firstname" => "Luis",
        //     "lastname" => "Amorim Rodrigues",
        //     "email" => "luisitaloar@gmail.com"
        // ]);
        // $customerNotificationModel->save();

        $customerResolve['entity_id'] = 3;
        $customerResolve['website_id'] = 3;
        $customerResolve['firstname'] = 'Firstname teste';
        $customerResolve['lastname'] = 'Lastname teste';
        $customerResolve['email'] = 'test@test.com';

        return $customerResolve;
    }
}
