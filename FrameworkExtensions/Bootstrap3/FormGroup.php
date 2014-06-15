<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * FormGroup.php
 * FormGroup
 */

namespace Bootstrap;

class FormGroup extends Form {
	
	public $label;

	public $textField;
	
	public $helpBlock;
	
	function __construct($parent) {
		parent::__construct($parent, 3, null);
		
		$this->tag = 'div';
		
		$this->setClass('form-group');
	}

}
