<?php

namespace Mastering\SampleModule\Model;

use Error;
use Mastering\SampleModule\Api\ItemRepositoryInterface;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface {
	private $collectionFactory;

	public function __construct(CollectionFactory $collectionFactory) {
		$this->collectionFactory = $collectionFactory;
	}

    private function convertToArray($items = []){
        $itemsParse = [];
        foreach ($items as $item) {
            array_push($itemsParse, array(
                'id' => $item->getId(),
                'name' => $item->getName(),
                'description' => $item->getDescription()
            ));
        }
        return $itemsParse;
    }

	public function getList(){
        $items = $this->collectionFactory->create()->getItems();
        $itemsParse = $this->convertToArray($items);
        return $itemsParse;
	}

    public function getOneById(int $id){
        $items = $this->collectionFactory->create()->addFieldToFilter('id', array('eq' => $id));
        $itemsParse = $this->convertToArray($items);
        return $itemsParse;
    }

    public function getOneByName(string $name){
        $items = $this->collectionFactory->create()->addFieldToFilter('name', array('like' => '%'.$name.'%'));
        $itemsParse = $this->convertToArray($items);
        return $itemsParse;
    }

	public function insert(string $name, string $description){

        $this->collectionFactory->create()->getConnection()->insert(self::TABLE_NAME, array(
            'name' => $name,
            'description' => $description
        ));
        $item = $this->collectionFactory->create()->getLastItem()->convertToArray();

        return $item;
    }

    public function edit(int $id, array $edit = []){
        $this->collectionFactory->create()->getConnection()->update(self::TABLE_NAME, array(
            'name' => $edit['name'],
            'description' => $edit['description']
        ), ['id = ?' => $id]);
        $item = $this->collectionFactory->create()->getItemById($id)->convertToArray();
        return $item;
    }

	public function deleteById(int $id){
        try {
            $item = $this->collectionFactory->create()->getItemById($id)->convertToArray();
            if (count($item) == 0) {
                new Error("Item not found");
            }else {
                $this->collectionFactory->create()->getConnection()->delete(self::TABLE_NAME, ['id = ?' => $id]);
            }

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
