<?php

/*
 * Created 21/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * CheckBoxControl.php
 * CheckBoxControl
 */

namespace PHPUIF;

class CheckBoxControl extends FormInput {
	
	public $checked;
	
	public function __construct($name) {
		parent::__construct('checkbox', $name);
	}

	public function setChecked($bool = true) {
		$this->checked = $bool;
	}

	public function getComplete() {
	
		if ($this->checked) {
			$this->setAttr('checked', 'checked');
		}
			
		return parent::getComplete();
	}

}
