<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * InputGroup.php
 * InputGroup
 */

namespace Bootstrap;

class InputGroup extends Form {
	
	public $leftAddon;
	
	public $rightAddon;
	
	public $textField;
	
	public $size;
	
	public function __construct($name = null, $placeholder = null, $value = null) {
		parent::__construct(4, null);
		
		$this->tag = 'div';
		
		$this->setClass('input-group');
		
		$this->textField($name, $placeholder, $value);
	}
	
	// !Size
	
	public function setSize($size = null) {
		$this->size = $size;
		return $this;
	}
	
	public function setLgSize() {
		return $this->setSize('lg');
	}
	
	public function setDefaultSize() {
		return $this->setSize();
	}
	
	public function setSmSize() {
		return $this->setSize('sm');
	}
	
	// !Controls
	
	public function textField($name = null, $placeholder = null, $value = null) {
		if ($this->textField) {
			return $this->textField;
		}
	
		$ctrl = new \PHPUIF\FormInput('text');
		$ctrl->setClass('form-control');
		$ctrl->setName($name);
		if ($this->nameAsId) {
			$ctrl->setId($name);
		}
		
		$ctrl->setPlaceholder($placeholder);
		$ctrl->setValue($value);
		
		$this->textField = $ctrl;
		
		return $ctrl;
	}

	public function getAddon($content = null, $isButtonAddon = false) {
		$ctrl = new Form(4, null);
		$ctrl->tag = 'span';
		if ($isButtonAddon) {
			$ctrl->setClass('input-group-btn');
		} else {
			$ctrl->setClass('input-group-addon');
		}
		$ctrl->setContent($content);
		return $ctrl;	
	}

	// !Simple Control

	public function addLeftAddon($content = null, $isButtonAddon = false) {
		$this->leftAddon = $this->getAddon($content, $isButtonAddon);
		return $this->leftAddon;
	}

	public function addRightAddon($content = null, $isButtonAddon = false) {
		$this->rightAddon = $this->getAddon($content, $isButtonAddon);
		return $this->rightAddon;
	}
	
	// !CheckBox Control
	
	public function addLeftAddonWithCheckBox($name = null, $checked = false) {
		$addon = $this->addLeftAddon();
		return $addon->addCheckBox($name, $checked);
	}

	public function addRightAddonWithCheckBox($name = null, $checked = false) {
		$addon = $this->addRightAddon();
		return $addon->addCheckBox($name, $checked);
	}
	
	// !Radio Button Control
	
	public function addLeftAddonWithRadioButton($name = false, $value = null, $checked = false) {
		$addon = $this->addLeftAddon();
		return $addon->addRadioButton($name, $value, $checked);
	}

	public function addRightAddonWithRadioButton($name = false, $value = null, $checked = false) {
		$addon = $this->addRightAddon();
		return $addon->addRadioButton($name, $value, $checked);
	}
	
	// !Button Control
	
	public function addLeftAddonWithButton($title, $id = null, $style = 'default') {
		$addon = $this->addLeftAddon(null, true);
		return $addon->addButton($title, $id, $style);
	}

	public function addRightAddonWithButton($title, $id = null, $style = 'default') {
		$addon = $this->addRightAddon(null, true);
		return $addon->addButton($title, $id, $style);
	}
	
	public function getComplete() {

		if ($this->size) {
			$this->addClass(sprintf('input-group-%s', $this->size));
		}

		if ($this->leftAddon) {
			$this->addControl($this->leftAddon);
		}

		if ($this->textField) {
			$this->addControl($this->textField);
		}				
		
		if ($this->rightAddon) {
			$this->addControl($this->rightAddon);
		}
		
		return parent::getComplete();
	}

}
