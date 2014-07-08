<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * FormControl.php
 * FormControl
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class FormControl extends OwnedControl {
	
	/**
	 * nameAsId - Set Identifier Automaticly Based on Name
	 * 
	 * @var Bool
	 * @access public
	 */
	public $nameAsId;
	
	public function __construct($name = null) {
		parent::__construct();
		$this->name     = $name;
		$this->nameAsId = false;

		$this->SetDefaultAttrs();
	}
	
	/**
	 * SetDefaultAttrs function.
	 * 
	 * @access protected
	 * @return void
	 */
	protected function SetDefaultAttrs() {
		if ($this->nameAsId) {
			$this->setId($this->name);
		}
	}
	
	/**
	 * getOpenTag function.
	 * Returns Open Tag for Form Control
	 * 
	 * @access public
	 * @return string
	 */
	public function getOpenTag() {
	
		$this->SetDefaultAttrs();

		if ($this->tag != 'div') {
			$this->setAttr('name', $this->name);
		}
		
		$attrs = $this->attrController->attrsInString();
		
		if ($this->hasClose == false) {
			$attrs .= ' /';
		}
		
		return sprintf('<%s%s>', $this->tag, $attrs);
	}

}
