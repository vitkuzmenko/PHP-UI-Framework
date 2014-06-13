<?php

require_once '../PHPUIFramework.php';

class index extends \PHPUIF\Document {
	
	public function __construct() {
		parent::__construct('hello', 'utf-8', 'en');
	
		$body = $this->body;
		
		$body->addDiv()->setContent('Hello World!');
		
		$form = $body->addForm(1, 'myForm', '/');
		$block = $form->addBlock('div', 'myClass');
		$block->addTextField('myTextField', 'My Text Field');
		$block->addTextArea();
		$block->addSelectField('mySelect', array(1, 2, 3), array('First', 'Second', 'Third'), 2);
		$block->addSelectField('mySelect', array(1, 2, 3), array(), 2);
		
		$items = array(
			'hello',
			'good' => array('goodwin'),
			'ask'
		);
		
		$list = $body->addList('ul');
		$list->addItems($items);

		$list = $body->addList('ul');
		$item = $list->addItem();
		$item->setClass('list-item');
		$item->addDiv('sider')->setContent('Sider');
		
		$table = $body->addTable();
		$row = $table->addRow(array(), true);
		$cell = $row->addCell();
		$cell->setContent('Cell 1');
		$cell = $row->addCell();
		$cell->setContent('Cell 2');
		$row = $table->addRow();
		$cell = $row->addCell();
		$cell->setContent('Cell 1');
		$cell = $row->addCell();
		$cell->setContent('Cell 2');


		$table = $body->addTable(3, 3);
		$table->fillRow(0, array(1, 2, 3));
		$table->fillRow(1, array(4, 5, 6));
		$table->fillRow(2, array(7, 8, 9));
		
		$table->cell(1, 1)->setContent('+');
	}
	
}

$document = new index();
$document->printAll();