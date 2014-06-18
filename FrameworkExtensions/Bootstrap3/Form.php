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
	
	public $hideLabels = false;
	
	/**
	 * formHorizontal
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $formHorizontal = false;
	
	private $labelOffset = 2;
	
	public function __construct($parent, $method, $name, $action = null, $nameAsId = true) {
		parent::__construct($parent, $method, $name, $action, $nameAsId);
	}
	
	public function setFormInline($formInline = true, $hideLabels = false) {
		$class = 'form-inline';
		
		$this->formInline = $formInline;
		$this->hideLabels = $hideLabels;
		
		if ($formInline) {
			$this->addClass($class);
			$this->setFormHorizontal(false);
		} else {
			$this->removeClass($class);
		}
	}

	public function setFormHorizontal($formHorizontal = true) {
		$class = 'form-horizontal';
		
		$this->formHorizontal = $formHorizontal;
		
		if ($formHorizontal) {
			$this->addClass($class);
			$this->setFormInline(false, false);
		} else {
			$this->removeClass($class);
		}
	}
	
	public function setHorizontalLabelOffset($offset) {
		$this->labelOffset = $offset;
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
	
	public function addTextArea($name = null, $placeholder = null, $value = null) {
		$ctrl = parent::addTextArea($name, $placeholder, $value);
		$ctrl->setClass('form-control');
		return $ctrl;
	}

	// !InputGroup
	
	public function addInputGroup() {
		$ctrl = new InputGroup($this);
		$ctrl->nameAsId = $this->nameAsId;
		$this->addControl($ctrl);
		return $ctrl;
	}


	// !Form Groups
	
	public function addFormGroup() {
		$ctrl = new FormGroup($this);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addEmptyFormGroup($name, $label = null) {
		$formGroup = $this->addFormGroup();
		$formGroup->label = $formGroup->addLabel($name, $label);
		$formGroup->label->addClass('control-label');
		$formGroup->formHorizontal = $this->formHorizontal;
		$formGroup->formInline = $this->formInline;
		$formGroup->hideLabels = $this->hideLabels;
		if ($this->formHorizontal) {
			$formGroup->label->addClass('col-sm-' . $this->labelOffset);
			
			$controlParent = $formGroup->addDiv('col-sm-' . (12 - $this->labelOffset));
		} else {
			$controlParent = $formGroup;
		}
		
		if ($this->hideLabels) {
			$formGroup->label->addClass('sr-only');
		}
		
		$formGroup->controlParent = $controlParent;
				
		return $formGroup;
	}
	
	public function addFormGroupWithLabelAndTextField($name, $label = null, $placeholder = null, $value = null) {
		$formGroup = $this->addEmptyFormGroup($name, $label);
		$formGroup->textField = $formGroup->controlParent->addTextField($name, $placeholder, $value);
		return $formGroup;
	}
	
	public function addFormGroupWithLabelTextFieldAndHelpBlock($name, $label = null, $placeholder = null, $value = null, $help = null) {
		$formGroup = $this->addFormGroupWithLabelAndTextField($name, $label, $placeholder, $value);
		
		if ($this->formHorizontal) {
			$parentForHelpBlock = $formGroup->controlParent;
		} else {
			$parentForHelpBlock = $formGroup;
		}
		
		$formGroup->helpBlock = $parentForHelpBlock->addHelpBlock($help);
		return $formGroup;
	}
	
	private function parentForNonLabelFormGroup() {
		$formGroup = $this->addFormGroup();
		if ($this->formHorizontal) {
			$leftSideOffset = $this->labelOffset;
			$rightSideOffset = 12 - $leftSideOffset;
		
			return $formGroup->addDiv('col-sm-offset-' . $leftSideOffset . ' col-sm-' . $rightSideOffset);
		} else {
			return $formGroup;
		}
	}
	
	public function addFormGroupWithCheckBox($name = null, $text = null, $checked = false) {
		$formGroup = $this->parentForNonLabelFormGroup();
		$formGroup->formInline = $this->formInline;
		$formGroup->checkbox = $formGroup->addCheckBoxSet($name, $text, $checked);
		return $formGroup;
	}

	public function addFormGroupWithRadioButton($name = null, $text = null, $value = null, $checked = false) {
		$formGroup = $this->parentForNonLabelFormGroup();
		$formGroup->formInline = $this->formInline;
		$formGroup->radioButton = $formGroup->addRadioButtonSet($name, $text, $value, $checked);
		return $formGroup;
	}
	
	public function addFormGroupWithSelectField($name, $label, array $value = array(), array $text = array(), $selectedValue = null) {
		$formGroup = $this->addEmptyFormGroup($name, $label);
		$formGroup->selectField = $formGroup->controlParent->addSelectField($name, $value, $text, $selectedValue);		
		return $formGroup;
	}
	
	// !Checkbox/Radio group
	
	public function addCheckBoxSet($name = null, $text = null, $checked = false) {
		
		if ($this->formInline) {
			$parentForLabel = $this;
		} else {
			$parentForLabel = $this->addDiv('checkbox');
		}
		
		$label = $parentForLabel->addLabel(null, $text);
		
		if ($this->formInline) {
			$label->setClass('checkbox-inline');
		}
		
		$ctrl = $label->addCheckBox($name, $checked);
		return $ctrl;
	}

	public function addRadioButtonSet($name = null, $text = null, $value = null, $checked = false) {
		if ($this->formInline) {
			$parentForLabel = $this;
		} else {
			$parentForLabel = $this->addDiv('radio');
		}

		$label = $parentForLabel->addLabel(null, $text);
		
		if ($this->formInline) {
			$label->setClass('radio-inline');
		}
		
		$ctrl = $label->addRadioButton($name, $value, $checked);
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
	
	public function addHelpBlock($text = null) {
		if ($this->formInline) {
			$tag = 'span';
		} else {
			$tag = 'p';
		}
		return $this->addBlock($tag, 'help-block', null, $text);
	}
	
	public function addButton($title, $name = null, $style = 'default') {
		$ctrl = new Button($this, $title, $name, $style);
		$this->addControl($ctrl);
		return $ctrl;
	}


}
