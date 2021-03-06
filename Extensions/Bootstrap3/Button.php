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
	
	/**
	 * showCaret
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $showCaret = false;
	
	public $submit = false;
	
	public $glyph;
	
	public $fa;
		
	function __construct($title = null, $id = null, $style = 'default', $size = null) {
		parent::__construct('button');
		
		$this->setId($id);
		$this->setClass('btn');
		
		$this->setButtonStyle($style);
		$this->setSize($size);
		
		$this->setButtonTitle($title);
	}
	
	public function setLink($href = null) {
		if ($href) {
			$this->tag = 'a';
			$this->setAttr('href', $href);
		}
	}
	
	public function setSubmit($bool = true) {
		$this->submit = $bool;
		return $this;
	}
	
	public function setButtonTitle($value = null) {
		$this->title = $value;
	}
	
	public function setGlyph($glyph = null) {
		$this->glyph = $glyph;		
	}

	public function setFa($fa = null) {
		$this->fa = $fa;		
	}
	
	private function addGlyph() {
		if ($this->glyph) {
			$this->addSpan('glyphicon glyphicon-' . $this->glyph);
		}
	}
	
	public function setDataToggle($value = null) {
		return $this->setAttr('data-toggle', $value);
	}
	
	public function setDataDismiss($value = null) {
		return $this->setAttr('data-dismiss', $value);
	}
	
	public function setDataTarget($value = null) {
		return $this->setAttr('data-target', $value);
	}
	
	public function setDataLoadingText($value = null) {
		return $this->setAttr('data-loading-text', $value);
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
		return $this;
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
		return $this;
	}
	
	public function setLgSize() {
		return $this->setSize('lg');
	}
	
	public function setSmSize() {
		return $this->setSize('sm');
	}
	
	public function setDefaultSize() {
		return $this->setSize();
	}
	
	public function setXsSize() {
		return $this->setSize('xs');
	}
	
	public function addFile($name) {
		$input = $this->addSimple('input');
		$input->setAttr('type', 'file');
		$input->setName($name);
		$this->addClass('file-holder');
		return $input;
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
	 * addCaret function.
	 * 
	 * @access public
	 * @return void
	 */
	public function showCaret($bool = true) {
		$this->showCaret = $bool;
		return $this;
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
		return $this;
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
		return $this;
	}
	
	public function getComplete() {
		if ($this->glyph) {
			$this->addGlyph();
		} else if ($this->fa) {
			$this->addFa($this->fa);
		}

		if ($this->controls) {
			$this->addContent($this->title);
		} else {
			$this->setContent($this->title);
		}
		
		$this->addBtnClass($this->size);		
		$this->addBtnClass($this->style);
		
		if ($this->submit) {
			$this->setAttr('type', 'submit');
		} else {
			$this->setAttr('type', 'button');
		}
		
		if ($this->showCaret) {
			$this->addSpan('caret');
		}
		
		if ($this->block) {
			$this->addBtnClass('block');
		}
		
		if ($this->active) {
			$this->addClass('active');
		}
		
		return parent::getComplete();
	}

}
