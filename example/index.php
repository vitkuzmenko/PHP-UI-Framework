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
		
	
	}
	
}


$document = new index();
$document->printAll();