<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * ButtonGroup.php
 * ButtonGroup
 */

namespace Bootstrap;

class ButtonGroup extends BlockControl {
	
	/**
	 * size
	 * Instead of applying button sizing classes to every button in a group
	 * 
	 * @var mixed
	 * @access public
	 */
	public $size;
	
	/**
	 * vertical
	 * Make a set of buttons appear vertically stacked rather than horizontally.
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $vertical = false;
	
	/**
	 * justified
	 * Make a group of buttons stretch at equal sizes to span the entire width of its parent
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $justified = false;
	
	public function __construct($parent) {
		parent::__construct($parent, 'div');
		$this->setClass('btn-group');
	}

	/**
	 * setVertical function.
	 * Make a set of buttons appear vertically stacked rather than horizontally.
	 * 
	 * @access public
	 * @param bool $bool (default: true)
	 * @return void
	 */
	public function setVertical($bool = true) {
		$this->vertical = $bool;
		return $this;
	}

	/**
	 * setJustified function.
	 * Make a group of buttons stretch at equal sizes to span the entire width of its parent
	 * 
	 * @access public
	 * @param bool $bool (default: true)
	 * @return void
	 */
	public function setJustified($bool = true) {
		$this->justified = $bool;
		return $this;
	}

	// !Sizing

	/**
	 * setSize function.
	 * Instead of applying button sizing classes to every button in a group.
	 * 
	 * @access public
	 * @param mixed $size (default: null)
	 * @return void
	 */
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

	public function setXsSize() {
		return $this->setSize('xs');
	}

	/**
	 * addDropdown function.
	 * 
	 * @access public
	 * @param bool $inGroup (default: true)
	 * @return ButtonGroup
	 */
	public function addDropdown($inGroup = true) {
		$ctrl = parent::addDropdown(true);
		$ctrl->setClass('btn-group');
		return $ctrl;
	}
	
	/**
	 * getComplete function.
	 * 
	 * @access public
	 * @return string
	 */
	public function getComplete() {

		if ($this->vertical) {
			$this->removeClass('btn-group');
			$this->addClass('btn-group-vertical');
		}
		
		if ($this->justified) {
			$this->addClass('btn-group-justified');
		}
	
		if ($this->size) {
			$this->addClass(sprintf('btn-group-%s', $this->size));
		}
	
		return parent::getComplete();
	}

}
