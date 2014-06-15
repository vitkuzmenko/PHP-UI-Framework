<?php

/*
 * Created 12/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * ComponentController.php
 * ComponentController
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

abstract class ComponentController extends ObjectController {
	
	protected $name; //control internal name (in TFormControl and it's descendants this = name attribute)
	
	public function __construct($parent) {
		parent::__construct($parent);
	}
	
	public function setName($name) {
		if ($name) {
			$this->name = $name;
		}
	}

}
