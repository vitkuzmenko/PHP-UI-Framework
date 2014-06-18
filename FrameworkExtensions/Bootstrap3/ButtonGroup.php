<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * ButtonGroup.php
 * ButtonGroup
 */

namespace Bootstrap;

class ButtonGroup extends BlockControl {
	
	public function __construct($parent) {
		parent::__construct($parent, 'div');
		$this->setClass('btn-group');
	}

	public function addDropdown($inGroup = true) {
		$ctrl = parent::addDropdown(true);
		$ctrl->setClass('btn-group');
		return $ctrl;
	}

}
