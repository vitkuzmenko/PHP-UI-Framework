<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * FormTextArea.php
 * FormTextArea
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class FormTextArea extends FormControl {
	
	/**
	 * rows - Rows count for textarea
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $rows;
	
	/**
	 * cols - Cols count for textarea
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $cols;
	
	public function __construct($name = null, $cols = 40, $rows = 4) {
		parent::__construct($name);
		
		$this->tag = 'textarea';
		$this->rows = $rows;
		$this->cols = $cols;
	}
	
	/**
	 * setSize function.
	 * 
	 * @access public
	 * @param mixed $cols
	 * @param mixed $rows
	 * @return void
	 */
	public function setSize($cols, $rows) {
		$this->cols = $cols;
		$this->rows = $rows;
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
	
	/**
	 * setWrap function.
	 * Set wrap text. Can take values: soft | hard
	 * 
	 * @access public
	 * @param mixed $wrap
	 * @return void
	 */
	public function setWrap($wrap) {
		$this->setAttr('wrap', $wrap);
	}
	
	/**
	 * setPlaeholder function.
	 * Placeholder for textarea
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
	 * 
	 * @access public
	 * @param mixed $maxLength
	 * @return void
	 */
	public function setMaxLength($maxLength) {
		$this->setAttr('maxlength', intval($maxLength));
	}
	
	/**
	 * SetDefaultAttrs function.
	 * 
	 * @access protected
	 * @return void
	 */
	protected function SetDefaultAttrs() {
		parent::SetDefaultAttrs();
		
		$this->setAttr("cols", $this->cols);
		$this->setAttr("rows", $this->rows);
	}

}
