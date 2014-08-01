<?php

/*
 * Created 24/07/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * ProgressBar.php
 * ProgressBar
 */

namespace Bootstrap;

class ProgressBar extends BlockControl {
	
	public $value;
	
	public $style;
	
	public $striped;
	
	public $active;
	
	public function __construct() {
		parent::__construct('div');
		$this->addClass('progress-bar');
	}

	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	
	// !Bar Style
	
	public function setStyle($value) {
		$this->style = $value;
		return $this;
	}

	public function setDefaultStyle() {
		return $this->setStyle(null);
	}
	
	public function setSuccessStyle() {
		return $this->setStyle('success');
	}
	
	public function setInfoStyle() {
		return $this->setStyle('success');
	}

	public function setWarningStyle() {
		return $this->setStyle('warning');
	}

	public function setDangerStyle() {
		return $this->setStyle('danger');
	}

	public function setStriped($bool = true) {
		$this->striped = $bool;
		return $this;
	}
	
	public function setActive($bool = true) {
		$this->active = $bool;
		return $this;
	}
	
	public function getComplete() {

		if ($this->value) {
			$this->setStyle(sprintf('width: %d\%', $this->value));
			$this->setAttr('aria-valuenow', $this->value);
			$this->setAttr('aria-valuemin', 0);
			$this->setAttr('aria-valuemax', 100);
		}
		
		if ($this->stye) {
			$this->addClass(sprintf('progress-bar-%s', $this->stye));
		}
		
		if ($this->striped) {
			$this->addClass('progress-bar-striped');
		}

		if ($this->active) {
			$this->addClass('active');
		}
		
		return parent::getComplete();
	}
	
}
