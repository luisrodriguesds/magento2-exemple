<?php

namespace Mastering\SampleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\InputInterface;
use Symfony\Component\Console\OutputInterface;

use Mastering\SampleModule\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command {
	const INPUT_KEY_NAME = 'name';
	const INPUT_KEY_DESCRITION = 'descrition';

	private $itemFactory;

	public function __construct(ItemFactory $itemFactory){
		$this->itemFactory = $itemFactory;
		parent::__construct();
	}

	protected function configure(){
		$this->setName('mastering:item:add')->addArgument(
			self::INPUT_KEY_NAME,
			InputArgument::REQUIRED,
			'Item name'
		)->addArgument(
			self::INPUT_KEY_DESCRITION,
			InputArgument::OPTIONAL,
			'Item description'
		);
		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$item = $this->itemFactory->create();
		$item->setName($input->getArgument(self::INPUT_KEY_NAME));
		$item->setDescription($input->getArgument(self::INPUT_KEY_DESCRITION));
		$item->setIsObjectNew(true);
		$item->save();
		
		return Cli::RETURN_SUCCESS;
	}
}