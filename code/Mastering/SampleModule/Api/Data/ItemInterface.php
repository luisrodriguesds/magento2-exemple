<?php

namespace Mastering\SampleModule\Api\Data;

interface ItemInterface {
    /**
	 * @return int
	 */
	public function getId();

	/**
	 * @return string
	 */
	public function getName();


	/**
	 * @return string|null
	 */
	public function getDescription();
}
