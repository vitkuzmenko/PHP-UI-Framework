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
	
	public function addButton($title, $name = null, $style = 'default') {
		$ctrl = new Button($this, $title, $name, $style);
		$this->addControl($ctrl);
		return $ctrl;
	}

}
