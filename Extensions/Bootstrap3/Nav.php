<?php

/*
 * Created 19/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Nav.php
 * Nav
 */

namespace Bootstrap;

class Nav extends \PHPUIF\ListControl {
	
	public $style = 'pills';
	
	public $allowStyle = array('tabs', 'pills', 'stacked');
	
	public $justified = false;
	
	public function __construct($parent, $style = 'pills') {
		parent::__construct($parent, 'ul');
		
		$this->addClass('nav');
				
		$this->setNavStyle($style);
	}
	
	// !Nav style
	
	public function setNavStyle($style) {
		$style = trim($style);
	
		if (in_array($style, $this->allowStyle)) {
			$this->style = $style;
		}
		
		return $this;
	}
	
	public function setTabsStyle() {
		return $this->setNavStyle('tabs');
	}
	
	public function setPillsStyle() {
		return $this->setNavStyle('pills');
	}
	
	public function setStackedStyle() {
		return $this->setNavStyle('stacked');
	}
	
	public function setJustified($bool = true) {
		$this->justified = $bool;
		return $this;
	}

	// !Items

	public function addItem($title = null, $href = null, $active = false, $disabled = false, $header = false) {
		$ctrl = new MenuItem($this, $title, $href, $active, $disabled, $header);
		$this->addControl($ctrl);
		return $ctrl;
	}

	// !Dropdown
	
	public function addDropdown($title = null, $href = null, $active = false, $disabled = false, $header = false) {
		$ctrl = new MenuItem($this, $title, $href, $active, $disabled, $header);
		$ctrl->addDropdown();
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function getComplete() {
		
		$this->addClass(sprintf('nav-%s', $this->style));
		
		if ($this->justified) {
			$this->addClass('nav-justified');
		}
	
		return parent::getComplete();
	}


}
