<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * FormSelect.php
 * FormSelect
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class FormSelect extends FormControl {
	
	/**
	 * size - If size more zero, then Select mutiple
	 * 
	 * @var int
	 * @access protected
	 */
	protected $size;
		
	public function __construct($parent, $name = "") {
		parent::__construct($parent, $name);
		
		$this->tag      = 'select';
		$this->size     = 0;
		
		$this->setDefaultAttrs();
	}
	
	/**
	 * setSize function.
	 * If size more zero, then Select mutiple
	 * 
	 * @access public
	 * @param int $lenght (default: 0)
	 * @return void
	 */
	public function setSize($lenght = 0) {
		$size->size = intval($lenght);
	}

	/**
	 * setDefaultAttrs function.
	 * 
	 * @access protected
	 * @return void
	 */
	protected function setDefaultAttrs() {
		parent::SetDefAttrs();
		if ($this->size > 0) {
			$this->setAttr('size', $this->size);
			$this->setAttr('multiple', 'multiple');
		}
	}
		
	/**
	 * addItem function.
	 * Add option item to select
	 * 
	 * @access public
	 * @param mixed $value
	 * @param mixed $text (default: null)
	 * @return Control
	 */
	public function addItem($value, $text = null) {
	
		$ctrl = new BlockControl($this, 'option');
		
		if (is_null($text)) {
			$ctrl->setContent($value);
		} else {
			$ctrl->attrController->setAttr('value', $value);
			$ctrl->setContent($text);
		}
		
		$this->addControl($ctrl);
		
		return $ctrl;
	}
	
	/**
	 * addItems function.
	 * Add items to select from 2 arrays. First array values, second array texts.
	 * Second array can be empty, then item not will be have value attribute
	 * 
	 * @access public
	 * @param array $value (default: array())
	 * @param array $text (default: array())
	 * @return void
	 */
	public function addItems(array $value = array(), array $text = array()) {
	
		if (count($value) & count($texts) == 0) {
			foreach ($value as $key => $value) {
				$this->addItem($value);
			}
		}
		
		if (count($value) == count($texts)) {
			foreach ($value as $key => $value) {
				$this->addItem($value, $texts[$key]);
			}
		}

	}
	
	/**
	 * setSelected function.
	 * Set default selected value in select list.
	 * 
	 * @access protected
	 * @param mixed $selectValue
	 * @param bool $checkText (default: false)
	 * @return void
	 */
	protected function setSelected($selectValue, $checkText = false) {
	
		foreach ($this->controls as $ctrl) {

			if ($ctrl->hasAttr('value') == false) {
				$checkText = true;
			}
			
			if ($checkText) {
				$value = $ctrl->content;
			} else {
				$value = $ctrl->attrController->attrValue('value');
			}
			
			if ($value == $selectValue) {
				$ctrl->setAttr('selected', 'selected');
			}
		}		
	}

}
