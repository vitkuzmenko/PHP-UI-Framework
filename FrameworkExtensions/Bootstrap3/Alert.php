<?php

/*
 * Created 19/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Alert.php
 * Alert
 */

namespace Bootstrap;

class Alert extends BlockControl {
	
	public $stye;
	
	public $dismissable = false;
	
	public function __construct($parent, $content = null, $style = 'warning', $dismissable = false) {
		parent::__construct($parent, 'div');
		
		$this->addClass('alert');
		$this->addContent($content);
		$this->setAlertStyle($style);
		$this->setDismissable($dismissable);
	}

	// !Alert Style

	public function setAlertStyle($style = 'warning') {
		if ($style) {
			$this->style = $style;
		}
	}
	
	public function setSuccessStyle() {
		$this->setAlertStyle('success');
	}
	
	public function setInfoStyle() {
		$this->setAlertStyle('info');
	}

	public function setWarningStyle() {
		$this->setAlertStyle('warning');
	}

	public function setDangerStyle() {
		$this->setAlertStyle('danger');
	}
	
	// !Dismissable
	
	public function setDismissable($bool = true) {
		$this->dismissable = $bool;
	}
	
	private function addDismissButton() {
		$ctrl = $this->addCloseButton();
		$ctrl->setAttr('data-dismiss', 'alert');
		
	}
	
	public function getComplete() {
	
		$this->addClass(sprintf('alert-%s', $this->style));
	
		if ($this->dismissable) {
			$this->addDismissButton();
			$this->addClass('alert-dismissable');
		}
		
		return parent::getComplete();
	}
	
	// !Links
	
	public function addLink($href, $title = null, $class = null, $hint = null) {
		$ctrl = parent::addLink($href, $title, $class, $hint);
		$ctrl->addClass('alert-link');
		return $ctrl;
	}

}
