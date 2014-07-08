<?php

/*
 * Created 28/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Panel.php
 * Panel
 */

namespace Bootstrap;

class Panel extends BlockControl {
	
	private $style = 'default';
	
	public $heading;
	
	public $body;
	
	public $footer;
	
	public $outside;
	
	public function __construct($style = 'default') {
		parent::__construct('div');
		
		$this->addClass('panel');
		$this->setPanelStyle($style);
	}

	// !Controls

	public function heading() {
		if ($this->heading) {
			return $this->heading;
		}
		
		$ctrl = new BlockControl('div');
		$ctrl->setClass('panel-heading');
		
		$this->heading = $ctrl;
		
		return $this->heading;
	}

	public function body() {
		if ($this->body) {
			return $this->body;
		}
		
		$ctrl = new BlockControl('div');
		$ctrl->setClass('panel-body');
		
		$this->body = $ctrl;
		
		return $this->body;
	}

	public function footer() {
		if ($this->footer) {
			return $this->footer;
		}
		
		$ctrl = new BlockControl('div');
		$ctrl->setClass('panel-footer');
		
		$this->footer = $ctrl;
		
		return $this->footer;
	}
	
	public function outside() {
		if ($this->outside) {
			return $this->outside;
		}
		
		$this->outside = new BlockControl(null);;
		
		return $this->outside;
	}
	
	// !Contents
	
	public function setHeaderContent($value = null) {
		return $this->heading()->setContent($value);
	}
	
	public function setBodyContent($value = null) {
		return $this->body()->setContent($value);
	}
	
	public function setFooterContent($value = null) {
		return $this->footer()->setContent($value);
	}

	// !Style
	
	public function setPanelStyle($value = 'default') {
		$this->style = $value;
		return $this;
	}
	
	public function setDefaultStyle() {
		return $this->setPanelStyle();
	}
	
	public function setSuccessStyle() {
		return $this->setPanelStyle('success');
	}
	
	public function setInfoStyle() {
		return $this->setPanelStyle('info');
	}

	public function setWarningStyle() {
		return $this->setPanelStyle('warning');
	}

	public function setDangerStyle() {
		return $this->setPanelStyle('danger');
	}
	
	// !Heading
	
	public function getComplete() {
		
		if ($this->style) {
			$this->addClass(sprintf('panel-%s', $this->style));
		}
		
		if ($this->heading) {
			$this->addControl($this->heading);
		}

		if ($this->body) {
			$this->addControl($this->body);
		}

		
		if ($this->outside) {
			$this->addControl($this->outside);
		}

		if ($this->footer) {
			$this->addControl($this->footer);
		}
			
		return parent::getComplete();
	}
	

}
