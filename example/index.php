<?php

require_once '../FrameworkExtensions/Bootstrap3/Bootstrap.php';

class index extends \Bootstrap\Document {
	
	public function __construct() {
		parent::__construct('hello', 'utf-8', 'en');
	
		$body = $this->body;
		
/*
		$dropdown = $body->addDropdown();
		$dropdown->cofigureButton('hello');
		
		$dropdown->addHeaderItem('Header');
		$dropdown->addItem('First Item', '#');
		$dropdown->addItem('Second Item', '#', true);
		$dropdown->addDivider();
		$dropdown->addItem('Third Item', '#', false, true);
*/
		
		$group = $body->addButtonGroup();
/* 		$group->setXsSize(); */
// 		$group->setVertical();
// 		$group->setJustified();
		$group->addButton('First Button');
		$group->addButton('Second Button');
		$group->addButton('Third Button');

		$dropdown = $group->addDropdown();
/* 		$dropdown->pullRight(); */
		$dropdown->cofigureButton('hello');
		
		$dropdown->addHeaderItem('Header');
		$dropdown->addItem('First Item', '#');
		$dropdown->addItem('Second Item', '#', true);
		$dropdown->addDivider();
		$dropdown->addItem('Third Item', '#', false, true);
		
		
	}
	
}

$document = new index();
$document->printAll();