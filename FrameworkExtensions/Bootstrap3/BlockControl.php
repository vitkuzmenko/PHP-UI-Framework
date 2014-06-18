<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * BlockControl.php
 * BlockControl
 */

namespace Bootstrap;

require_once realpath(dirname(__FILE__)) . '/Bootstrap.php';

class BlockControl extends \PHPUIF\BlockControl {
	
	public function __construct($parent = null, $tag = 'div') {
		parent::__construct($parent, $tag);
	}

	public function addForm($method, $name, $action = null, $nameAsId = true) {
		$ctrl = new Form($this, $method, $name, $action, $nameAsId);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addButton($title, $id = null, $style = 'default') {
		$ctrl = new Button($this, $title, $id, $style);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addCloseButton($id = null) {
		$ctrl = parent::addButton('&times;', $id);
		$ctrl->addClass('close');
		return $ctrl;
	}
	
	public function addDropdown() {
		$ctrl = new \Bootstrap\Dropdown($this);
		$this->addControl($ctrl);
		return $ctrl;
	}

}
