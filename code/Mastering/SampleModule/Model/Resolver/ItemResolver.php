<?php

declare(strict_types=1);

namespace Mastering\SampleModule\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Query\ResolverInterface;

// use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
// use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use Mastering\SampleModule\Model\ItemRepository;

class ItemResolver implements ResolverInterface {

    /**

     * @param ValueFactory $valueFactory
     *
     */
    public function __construct(
        ValueFactory $valueFactory,
        ItemRepository $itemRepository
    ) {
        $this->valueFactory = $valueFactory;
		$this->itemRepository = $itemRepository;
    }


    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)  {
        switch ($info->fieldName) {
            case 'getSampleItems':
                if (isset($args['id'])) {
                    $resItems = $this->itemRepository->getOneById($args['id']);
                }else if (isset($args['name'])) {
                    $resItems = $this->itemRepository->getOneByName($args['name']);
                }else{
                    $resItems = $this->itemRepository->getList();
                }
                return $resItems;
                break;
            case 'insertSampleItem':
                $resItems = $this->itemRepository->insert($args['name'], $args['description']);
                return $resItems;
                break;
            case 'updateSampleItem':
                $resItems = $this->itemRepository->edit($args['id'], array(
                    'name' => $args['input']['name'],
                    'description' => $args['input']['description']
                ));
                return $resItems;
                break;
            case 'deleteSampleItem':
                $deleteStatus = $this->itemRepository->deleteById($args['id']);
                return $deleteStatus;
                break;
            default:
                # code...
                break;
        }

    }
}
