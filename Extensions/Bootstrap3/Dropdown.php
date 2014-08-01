<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Dropdown.php
 * Dropdown
 */

namespace Bootstrap;

class Dropdown extends BlockControl {
	
	/**
	 * button - Contains Button Object
	 * 
	 * @var mixed
	 * @access public
	 */
	public $button;
	
	/**
	 * showCaret - Add caret to button or no
	 * 
	 * (default value: true)
	 * 
	 * @var bool
	 * @access public
	 */
	public $showCaret = true;
	
	/**
	 * menu - Contains DropdownMenu Object
	 * 
	 * @var mixed
	 * @access public
	 */
	public $menu;
	
	/**
	 * inGroup - add to btn-group or no
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $inGroup = false;
	
	/**
	 * dropUp
	 * Trigger dropdown menus above elements by adding .dropup to the parent.
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access public
	 */
	public $dropUp = false;
	
	public function __construct($inGroup = false) {
		parent::__construct('div');
		$this->inGroup = $inGroup;		
		$this->initMenu();
	}
	
	/**
	 * setDropUp function.
	 * Trigger dropdown menus above elements
	 * 
	 * @access public
	 * @param bool $bool (default: true)
	 * @return void
	 */
	public function setDropUp($bool = true) {
		$this->dropUp = $bool;
	}
	
	/**
	 * cofigureButton function.
	 * Configure Button Object
	 * 
	 * @access public
	 * @param mixed $title (default: null)
	 * @param mixed $id (default: null)
	 * @param string $style (default: 'default')
	 * @param mixed $size (default: null)
	 * @return void
	 */
	public function cofigureButton($title = null, $id = null, $style = 'default', $size = null) {
		$button = new Button($title, $id, $style, $size);
		$button->setAttr('data-toggle', 'dropdown');
		
		if ($this->inGroup) {
			$button->addClass('dropdown-toggle');
		}
		
		$this->button = $button;
		
		return $button;
	}
	
	/**
	 * showCaret function.
	 * Shows caret in button
	 * 
	 * @access public
	 * @param bool $bool (default: true)
	 * @return void
	 */
	public function showCaret($bool = true) {
		$this->showCaret = $bool;
	}
	
	/**
	 * removeCaret function.
	 * Remove added caret from button
	 * 
	 * @access public
	 * @return void
	 */
	public function removeCaret() {
		$this->showCaret = false;
	}
	
	/**
	 * pullRight function.
	 * Position of Dropdownmenu
	 * 
	 * @access public
	 * @return void
	 */
	public function pullRight() {
		$this->menu->pullRight();
	}
	
	/**
	 * initMenu function.
	 * Menu initialization
	 * 
	 * @access public
	 * @return void
	 */
	public function initMenu() {
		$this->menu = new DropdownMenu($this);
		return $this->menu;
	}
	
	// !Items
	
	/**
	 * addItem function.
	 * Adding item to dropdownmenu
	 * 
	 * @access public
	 * @param mixed $title (default: null)
	 * @param mixed $href (default: null)
	 * @param bool $active (default: false)
	 * @param bool $disabled (default: false)
	 * @param bool $header (default: false)
	 * @return void
	 */
	public function addItem($title = null, $href = null, $active = false, $disabled = false, $header = false) {
		return $this->menu->addItem($title, $href, $active, $disabled, $header);
	}
	
	/**
	 * addHeaderItem function.
	 * 
	 * @access public
	 * @param mixed $title
	 * @return void
	 */
	public function addHeaderItem($title) {
		return $this->menu->addHeaderItem($title);
	}

	/**
	 * addDivider function.
	 * 
	 * @access public
	 * @return void
	 */
	public function addDivider() {
		return $this->menu->addDivider();
	}
	
	/**
	 * getComplete function.
	 * 
	 * @access public
	 * @return void
	 */
	public function getComplete() {
		
		if ($this->inGroup) {
			$this->addClass('btn-group');
		} else {
			$this->addClass('dropdown');
		}
		
		if ($this->dropUp) {
			$this->addClass('dropup');
		}
		
		if ($this->button) {
			$this->addControl($this->button);
			$this->button->showCaret($this->showCaret);
		}
		
		if ($this->menu) {
			$this->addControl($this->menu);
		}
			
		return parent::getComplete();
	}

}
