<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * DropdownMenu.php
 * DropDownMenu
 */

namespace Bootstrap;

class DropdownMenu extends \PHPUIF\ListControl {
	
	public function __construct($parent) {
		parent::__construct($parent, 'ul');
		
		$this->addClass('dropdown-menu');
	}
	
	public function pullRight() {
		$this->addClass('dropdown-menu-right');
	}

	public function addItem($title = null, $href = null, $active = false, $disabled = false, $header = false) {
		$ctrl = new MenuItem($this, $title, $href, $active, $disabled, $header);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addHeaderItem($title) {
		return $this->addItem($title, null, false, false, true);
	}
	
	public function addDivider() {
		return $this->addBlock('li', 'divider');
	}
	
}
