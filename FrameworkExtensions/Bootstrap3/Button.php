<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Button.php
 * Button
 */

namespace Bootstrap;

class Button extends BlockControl {
	
	public $title;
	
	/**
	 * size - Contains size button. Allow parameters: lg | sm | xs
	 * 
	 * @var mixed
	 * @access public
	 */
	public $size;
	
	/**
	 * type - Default parameters: default | primary | success | info | warning | danger | link
	 * 
	 * @var mixed
	 * @access public
	 */
	public $style;
	
	/**
	 * block - Create block level buttons—those that span the full width of a parent by adding .btn-block.
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $block = false;
	
	/**
	 * active - No need to add :active as it's a pseudo-class, but if you need to force the same appearance, go ahead and add .active.
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $active = false;
	
	function __construct($parent, $title = null, $name = null, $style = 'default', $size = null) {
		parent::__construct($parent, 'button');
		
		
		$this->setAttr('type', 'button');
		$this->setClass('btn');
		
		$this->setButtonStyle($style);
		$this->setSize($size);
		
		$this->setButtonTitle($title);
	}
	
	public function setButtonTitle($value = null) {
		$this->title = $value;
	}
	
	/**
	 * setBtnClass function.
	 * Adding .btn-$class class
	 * 
	 * @access private
	 * @param mixed $class
	 * @return void
	 */
	private function addBtnClass($class = null) {
		if ($class) {
			$this->addClass(sprintf('btn-%s', $class));
		}
	}
	
	/**
	 * setSize function.
	 * Set size button. Default parameters: lg | sm | xs
	 * 
	 * @access public
	 * @param mixed $size
	 * @return void
	 */
	public function setSize($size = null) {
		$this->size = $size;
	}
	
	public function setLgSize() {
		$this->setSize('lg');
	}
	
	public function setSmSize() {
		$this->setSize('sm');
	}
	
	public function setDefaultSize() {
		$this->setSize();
	}
	
	public function setXsSize() {
		$this->setSize('xs');
	}
	
	// !Button Type
	
	/**
	 * setButtonType function.
	 * Default Bootstrap parameters: default | primary | success | info | warning | danger | link
	 * 
	 * @access public
	 * @param mixed $value
	 * @return void
	 */
	public function setButtonStyle($value) {
		$this->style = $value;
		return $this;
	}
	
	public function setDefaultStyle() {
		return $this->setButtonStyle('default');
	}
	
	public function setPrimaryStyle() {
		return $this->setButtonStyle('primary');
	}
	
	public function setSuccessStyle() {
		return $this->setButtonStyle('success');
	}
	
	public function setInfoStyle() {
		return $this->setButtonStyle('info');
	}
	
	public function setWarningStyle() {
		return $this->setButtonStyle('warning');
	}
	
	public function setDangerStyle() {
		return $this->setButtonStyle('danger');
	}

	public function setLinkStyle() {
		return $this->setButtonStyle('link');
	}
	
	/**
	 * setBlock function.
	 * Create block level buttons—those that span the full width of a parent by adding .btn-block.
	 * 
	 * @access public
	 * @param bool $bool (default: true)
	 * @return void
	 */
	public function setBlock($bool = true) {
		$this->block = $bool;
	}
	
	/**
	 * setActive function.
	 * No need to add :active as it's a pseudo-class, but if you need to force the same appearance, go ahead and add .active.
	 * 
	 * @access public
	 * @return void
	 */
	public function setActive($bool = true) {
		$this->active = $bool;
	}
	
	public function getComplete() {
		$this->setContent($this->title);
		$this->addBtnClass($this->size);		
		$this->addBtnClass($this->style);
		
		if ($this->block) {
			$this->addBtnClass('block');
		}
		
		if ($this->active) {
			$this->addClass('active');
		}
		
		return parent::getComplete();
	}

}
