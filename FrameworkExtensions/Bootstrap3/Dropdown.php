<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Dropdown.php
 * Dropdown
 */

namespace Bootstrap;

class Dropdown extends BlockControl {
	
	public $button;
	
	public $addCaret = true;
	
	public $menu;
	
	public function __construct($parent) {
		parent::__construct($parent, 'div');
		
		$this->setClass('dropdown');
		$this->initMenu();
	}
	
	public function initButton($title = null, $id = null, $style = 'default', $size = null) {
		$this->button = new Button($this, $title, $id, $style, $size);
		$this->button->setAttr('data-toggle', 'dropdown');
		return $this->button;
	}
	
	public function addCaret($bool = true) {
		$this->addCaret = $bool;
	}
	
	public function initMenu() {
		$this->menu = new DropdownMenu($this);
		return $this->menu;
	}
	
	// !Items
	
	public function addItem($title = null, $href = null, $active = false, $disabled = false, $header = false) {
		return $this->menu->addItem($title, $href, $active, $disabled, $header);
	}
	
	public function addHeaderItem($title) {
		return $this->menu->addHeaderItem($title);
	}

	public function addDivider() {
		return $this->menu->addDivider();
	}
	
	public function getComplete() {
		
		if ($this->button) {
			$this->addControl($this->button);
		}
		
		if ($this->menu) {
			$this->addControl($this->menu);
		}
			
		return parent::getComplete();
	}

}
