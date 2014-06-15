<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Form.php
 * Form
 */

namespace Bootstrap;

require_once realpath(dirname(__FILE__)) . '/Bootstrap.php';

class Form extends \PHPUIF\Form {
	
	/**
	 * formInline - form-inline true or false
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $formInline = false;
	
	public function __construct($parent, $method, $name, $action = null, $nameAsId = true) {
		parent::__construct($parent, $method, $name, $action, $nameAsId);
		
		$this->setAttr('role', 'form');
	}
	
	public function setFormInline($formInline = true) {
		$class = 'form-inline';
		
		if ($formInline) {
			$this->addClass($class);
		} else {
			$this->removeClass($class);
		}
	}

	// !Add Controls
	
	public function addTextField($name = null, $placeholder = null, $value = null) {
		$ctrl = parent::addTextField($name, $placeholder, $value);
		$ctrl->setClass('form-control');
		return $ctrl;
	}
	
	public function addNumberField($name = null, $placeholder = null, $value = null) {
		$ctrl = parent::addNumberField($name, $placeholder, $value);
		$ctrl->setClass('form-control');
		return $ctrl;
	}
	
	public function addPasswordField($name = null, $placeholder = null, $value = null) {
		$ctrl = parent::addPasswordField($name = null, $placeholder = null, $value = null);
		$ctrl->setClass('form-control');
		return $ctrl;
	}

	public function addSelectField($name = null, array $value = array(), array $text = array(), $selectedValue = null) {
		$ctrl = parent::addSelectField($name, $value, $text, $selectedValue);
		$ctrl->setClass('form-control');
		return $ctrl;
	}

	// !Form Groups
	
	public function addFormGroup() {
		$ctrl = new FormGroup($this);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addFormGroupWithLabelAndTextField($id, $label = null, $placeholder = null, $value = null) {
		$formGroup = $this->addFormGroup();
		$formGroup->label = $formGroup->addLabel($id, $label);
		$formGroup->textField = $formGroup->addTextField($id, $placeholder, $value);
		return $formGroup;
	}
	
	public function addFormGroupWithLabelTextFieldAndHelpBlock($id, $label = null, $placeholder = null, $value = null, $help = null) {
		$formGroup = $this->addFormGroupWithLabelAndTextField($id, $label, $placeholder, $value);
		$formGroup->helpBlock = $formGroup->addHelpBlock($help);
		return $formGroup;
	}
		
	// !Block

	public function addBlock($tag = null, $class = null, $id = null, $content = null) {
		$ctrl = new Form($this, 3, null);
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
	
	public function addHelpBlock($text = null) {
		return $this->addBlock('p', 'help-block');
	}

}
