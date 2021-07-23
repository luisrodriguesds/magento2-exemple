<?php

namespace Mastering\SampleModule\Api;

interface ItemRepositoryInterface {
    const TABLE_NAME = 'mastering_sample_item';

	public function getList();

	public function getOneById(int $id);

	public function getOneByName(string $name);

	public function insert(string $name, string $description);

    public function edit(int $id, array $edit = []);

	public function deleteById(int $id);
}
