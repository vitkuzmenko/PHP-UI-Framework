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

	public function addBlock($tag = null, $class = null, $id = null, $content = null) {
		$ctrl = new BlockControl($this, $tag);
		
		if ($tag == null) {
			$ctrl->clear = true;
		}
		
		$ctrl->setClass($class);
		$ctrl->setId($id);
		$ctrl->setContent($content);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addDiv($class = null, $id = null, $content = null) {
		return $this->addBlock('div', $class, $id, $content);
	}

	public function addSpan($class = null, $id = null, $content = null) {
		return $this->addBlock('span', $class, $id, $content);
	}
	
	public function addSection($class = null, $id = null, $content = null) {
		return $this->addBlock('section', $class, $id, $content);
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
	
	public function addButtonGroup() {
		$ctrl = new ButtonGroup($this);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addCloseButton($id = null) {
		$ctrl = parent::addButton('&times;', $id);
		$ctrl->addClass('close');
		return $ctrl;
	}
	
	public function addDropdown($inGroup = false) {
		$ctrl = new \Bootstrap\Dropdown($this, $inGroup);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addNav($style = 'pills') {
		$ctrl = new Nav($this, $style);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addAlert($content, $style = 'warning', $dismissable = false) {
		$ctrl = new Alert($this, $content, $style, $dismissable);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	
	
}
