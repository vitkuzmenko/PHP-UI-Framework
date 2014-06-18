<?php

require_once '../FrameworkExtensions/Bootstrap3/Bootstrap.php';

class index extends \Bootstrap\Document {
	
	public function __construct() {
		parent::__construct('hello', 'utf-8', 'en');
	
		$body = $this->body;
		
		$dropdown = new \Bootstrap\Dropdown($body);
		$dropdown->initButton('hello');
		
		$dropdown->addHeaderItem('Header');
		$dropdown->addItem('First Item', '#');
		$dropdown->addItem('Second Item', '#', true);
		$dropdown->addDivider();
		$dropdown->addItem('Third Item', '#', false, true);
		
		$body->addControl($dropdown);
	}
	
}

$document = new index();
$document->printAll();