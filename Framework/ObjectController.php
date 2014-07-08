<?php

/*
 * Created 12/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * ObjectController.php
 * ObjectController
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

abstract class ObjectController {

	protected $parentControl; // Parent object reference
	
	public function __construct() {

	}
	
	public function __get($key) {
		if (property_exists($this, $key)) {
			return $this->$key;
		}
	}
	
	public function __isset($key) {
		return isset($this->$key);
	}
	
	public function hasParent() {
		return isset($this->parentControl);
	}
	
	public function getParentControl() {
	
		if ($this->hasParent()) {
			return $this->parentcontrol;
		}
		
		return null;
	}
	
	public function getParentProperty($key) {
	
		if (!$this->HasParent()) {
			return null;
		}
		
		$parent = $this->parentControl;
		
		while ((!property_exists($parent, $key)) || (!isset($parent->$key)) ) {
			$parent = $parent->parentControl;
		}
		
		if (property_exists($parent,$name)) {
			return $parent->$key;
		} 
		
		return null;
		
	}
}
