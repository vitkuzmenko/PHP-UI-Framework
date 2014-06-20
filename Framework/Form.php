<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Form.php
 * Form
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class Form extends BlockControl {
	
	/**
	 * method - Form method
	 * 
	 * @var int
	 * @access public
	 */
	public $method;
	
	/**
	 * action - Form action handler
	 * 
	 * @var mixed
	 * @access public
	 */
	public $action;
	
	/**
	 * nameAsId - Set name is identifies
	 * 
	 * @var bool
	 * @access public
	 */
	public $nameAsId;
	
	public function __construct($parent, $method, $name, $action = null, $nameAsId = true) {
		parent::__construct($parent);
		$this->tag = 'form';
		$this->setAttr('name', $name);
		/* Устанавливаем имя формы как идентификатор */
		
		$this->method = $method;
		
		if ($nameAsId) {
			$this->setAttr('id', $name);
			$this->nameAsId = true;
		}
		
		$this->setAttr('action', $action);
		$this->setMethod($method);
	}
	
	/**
	 * setMethod function.
	 * Can take int from 0 to 3.
	 * Method 0: Get. Spaces replaces as +. Symbols encoded to hexadecimal.
	 * Method 1: Get. Spaces replaces as +. Symbols not encoded.
	 * Method 2: Post. This method for post request and file submit.
	 * Method 3: This methos for JavaScript handler
	 * Method 4: Just Block
	 * 
	 * @access public
	 * @param int $method
	 * @return void
	 */
	public function setMethod($method) {
		switch ($method) {
			case 0:
				$this->setAttr('enctype', 'application/x-www-form-urlencoded');
				$this->setAttr('method', 'get');
				break;
			case 1:
				$this->setAttr('enctype', 'text/plain');
				$this->setAttr('method', 'get');
				break;
			case 2:
				$this->setAttr('enctype', 'multipart/form-data');
				$this->setAttr('method', 'post');
				break;
			case 3:
				
				break;
		}		
	}
	
	// !Add Controls
	
	public function addInput($type, $name = null) {
		$ctrl = new FormInput($this, $type, $name);
		if ($this->nameAsId) {
			$ctrl->setId($name);
		}
		$this->AddControl($ctrl);
		return $ctrl;
	}

	public function addTextField($name = null, $placeholder = null, $value = null) {
		$ctrl = $this->addInput('text', $name);	
		$ctrl->setPlaceholder($placeholder);
		$ctrl->setAttr('autocomplete', 'off');
		$ctrl->setValue($value);
		return $ctrl;
	}
	
	public function addNumberField($name = null, $placeholder = null, $value = null) {
		$ctrl = $this->addInput('number', $name);
		$ctrl->setPlaceholder($placeholder);
		$ctrl->setAttr('value', $value);
		return $ctrl;
	}
	
	public function addPasswordField($name = null, $placeholder = null, $value = null) {
		$ctrl = $this->addInput('password', $name);
		$ctrl->setPlaceholder($placeholder);
		$ctrl->setAttr('value', $value);
		return $ctrl;
	}
	
	public function addLabel($for = null, $text = null) {
		$ctrl = $this->addBlock('label', null, null, $text);
		$ctrl->setAttr('for', $for);		
		return $ctrl;
	}
	
	public function addHidden($name = null, $value = null) {
		$ctrl = $this->addInput('hidden', $name);
		$ctrl->setValue($value);
		return $ctrl;
	}
	
	public function addFile($name = null, $multiple = false) {
		$ctrl = $this->addInput('file', $name);
		if ($multiple) {
			$ctrl->setAttr('multiple', 'multiple');
		}
		return $ctrl;
	}
	
	public function addCheckBox($name = null, $checked = false) {
		$ctrl = $this->addInput('checkbox', $name);
		
		if ($this->nameAsId) {
			$ctrl->setId($name);
		}
		
		if ($checked) {
			$ctrl->setAttr('checked', 'checked');
		}
		return $ctrl;
	}

	public function addRadioButton($name = null, $value = null, $checked = false) {
		$ctrl = $this->addInput('radio', $name);
		$ctrl->setValue($value);
		if ($checked) {
			$ctrl->setAttr('checked', 'checked');
		}
		return $ctrl;
	}		

	public function addSelectField($name = null, array $value = array(), array $text = array(), $selectedValue = null) {
		$ctrl = new FormSelect($this, $name);
		$ctrl->addItems($value, $text);
		
		if ($this->nameAsId) {
			$ctrl->setId($name);
		}
		
		if ($selectedValue) {
			$ctrl->setSelected($selectedValue);
		}
		
		$this->AddControl($ctrl);
		return $ctrl;
	}
	
	public function addTextArea($name = null, $placeholder = null, $value = null) {
		$ctrl = new FormTextArea($this, $name);
		$ctrl->setPlaceholder($placeholder);
		$ctrl->setContent($value);
		
		if ($this->nameAsId) {
			$ctrl->setId($name);
		}

		$this->AddControl($ctrl);
		return $ctrl;
	}

	// !Block

	public function addBlock($tag = null, $class = null, $id = null, $content = null) {
		$ctrl = new Form($this, 4, null);
		$ctrl->tag = $tag;
		
		if ($tag == null) {
			$ctrl->clear = true;
		}
		
		$ctrl->setClass($class);
		$ctrl->setId($id);
		$ctrl->setContent($content);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addFieldset($legend = null) {
		
		$fieldset = $this->addBlock('fieldset');
		
		if ($legend) {
			$fieldset->addBlock('legend', null, null, $legend);
		}
		
		return $fieldset;
	}

	public function addDiv($class = null, $id = null, $content = null) {
		return $this->addBlock('div', $class, $content);
	}

	public function addSpan($class = null, $id = null, $content = null) {
		return $this->addBlock('span', $class, $content);
	}
	
	public function addSection($class = null, $id = null, $content = null) {
		return $this->addBlock('section', $class, $content);
	}

}
