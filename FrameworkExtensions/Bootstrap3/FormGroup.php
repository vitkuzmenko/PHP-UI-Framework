<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * FormGroup.php
 * FormGroup
 */

namespace Bootstrap;

class FormGroup extends Form {

	public $label;
	
	public $controlParent;

	public $textField;
	
	public $checkbox;
	
	public $radioButton;
	
	public $selectField;
	
	public $helpBlock;
	
	public $stateImage;
	
	private $validationStateClass = array('has-success', 'has-warning', 'has-error');
	
	function __construct($parent) {
		parent::__construct($parent, 3, null);
		
		$this->tag = 'div';
		
		$this->setClass('form-group');
	}

	private function setStateClass($class, $stateImage = null) {
		$this->removeClass($this->validationStateClass);
		$this->addClass($class);
		
		if ($stateImage) {
			$this->setStateImage($stateImage);
		}
	}

	/**
	 * setSuccessState function.
	 * Set class .has-success
	 * 
	 * @access public
	 * @return void
	 */
	public function setSuccessState($stateImage = false) {
		$this->setStateClass($this->validationStateClass[0], $stateImage ? 'ok' : null);
	}

	/**
	 * setWarningState function.
	 * Set class .has-warning
	 * 
	 * @access public
	 * @return void
	 */
	public function setWarningState($stateImage = false) {
		$this->setStateClass($this->validationStateClass[1], $stateImage ? 'warning-sign' : null);
	}
	
	/**
	 * setErrorState function.
	 * Set class .has-error
	 * 
	 * @access public
	 * @return void
	 */
	public function setErrorState($stateImage = false) {
		$this->setStateClass($this->validationStateClass[2], $stateImage ? 'remove' : null);
	}
	
	public function setStateImage($icon) {
		if ($this->stateImage) {
			$this->freeControl($this->stateImage);
		}
		
		$this->addClass('has-feedback');
		
		return $this->addSpan('glyphicon glyphicon-' . $icon . ' form-control-feedback');
	}
}
