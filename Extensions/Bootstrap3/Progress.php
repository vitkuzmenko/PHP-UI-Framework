<?php

/*
 * Created 24/07/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Progress.php
 * Progress
 */

namespace Bootstrap;

class Progress extends BlockControl {
	
	public function __construct() {
		parent::__construct('div');
		$this->addClass('progress');
	}

	public function addBar($style = null, $value = 0) {
		$ctrl = new ProgressBar();
		$ctrl->setStyle($style);
		$ctrl->setValue($value);
		$this->addControl($ctrl);
		return $ctrl;
	}

}
