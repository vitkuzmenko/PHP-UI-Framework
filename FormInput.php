<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * FormInput.php
 * FormInput
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class FormInput extends FormControl {
	
	/**
	 * size - For TextField Only
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $size;
	
	/**
	 * tagType - Type of Input Control
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $tagType;     //e.g. text, submit, file
	
	public function __construct($parent = null, $type = null, $name = null) {
		parent::__construct($parent, $name);
		
		$this->tag      = 'input';
		$this->tagType  = $type;
		$this->hasClose = false;
		
		$this->SetDefaultAttrs();
	}
	
	/**
	 * setSize function.
	 * Size Attribute for Input Text Type
	 * 
	 * @access public
	 * @param int $len (default: 0)
	 * @return void
	 */
	public function setSize($len = 0) {
		$this->size = $len;
	}
	
	/**
	 * setPlaeholder function.
	 * Insert placeholder to text field
	 * 
	 * @access public
	 * @param mixed $placeholder
	 * @return void
	 */
	public function setPlaceholder($placeholder) {
		$this->setAttr('placeholder', $placeholder);
	}
	
	/**
	 * setMaxLength function.
	 * Max length for text field
	 * 
	 * @access public
	 * @param mixed $maxLength
	 * @return void
	 */
	public function setMaxLength($maxLength) {
		$this->setAttr('maxlength', intval($maxLength));
	}

	/**
	 * setReadOnly function.
	 * 
	 * @access public
	 * @param bool $readOnly (default: true)
	 * @return void
	 */
	public function setReadOnly($readOnly = true) {
		if ($readOnly) {
			$this->setAttr('readonly', 'readonly');
		} else {
			$this->attrController->removeAttr('readonly');
		}
	}
	
	public function setValue($value) {
		$this->setAttr('value', $value);
	}

	/**
	 * SetDefaultAttrs function.
	 * 
	 * @access protected
	 * @return void
	 */
	protected function SetDefaultAttrs() {
		parent::SetDefaultAttrs();
		
		$this->setAttr('type', $this->tagType);
		
		if ($this->size > 0) {
			 $this->setAttr('size', $this->size);
		}
	}
}
