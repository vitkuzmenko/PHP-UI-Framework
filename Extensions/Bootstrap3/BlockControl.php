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
	
	public function __construct($tag = 'div') {
		parent::__construct($tag);
	}

	public function addBlock($tag = null, $class = null, $id = null, $content = null) {
		$ctrl = new BlockControl($tag);
		
		if ($tag == null) {
			$ctrl->clear = true;
		}
		
		$ctrl->setClass($class);
		$ctrl->setId($id);
		$ctrl->setContent($content);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addP($class = null, $id = null, $content = null) {
		return $this->addBlock('p', $class, $id, $content);
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
	
	public function addImage($src, $alt = null, array $size = array()) {
		$ctrl = new Image($src, $alt);
		if ($size) {
			$ctrl->setSize($size[0], $size[1]);
		}
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function addLink($href, $title = null, $class = null, $hint = null) {
		$ctrl = new LinkControl($href, $title);
		$ctrl->addClass($class);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addFa($icon) {
		return $this->addSpan('fa fa-' . $icon);
	}

	public function addForm($method, $name, $action = null, $nameAsId = true) {
		$ctrl = new Form($method, $name, $action, $nameAsId);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addButton($title, $id = null, $style = 'default') {
		$ctrl = new Button($title, $id, $style);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addButtonGroup() {
		$ctrl = new ButtonGroup();
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function addButtonToolbar() {
		return $this->addBlock('div', 'btn-toolbar');
	}
	
	public function addCloseButton($id = null) {
		$ctrl = parent::addButton('&times;', $id);
		$ctrl->addClass('close');
		return $ctrl;
	}
	
	public function addDropdown($inGroup = false) {
		$ctrl = new \Bootstrap\Dropdown($inGroup);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addNav($style = 'pills') {
		$ctrl = new Nav($style);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addAlert($content, $style = 'warning', $dismissable = false) {
		$ctrl = new Alert($content, $style, $dismissable);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addTable($cols = 0, $rows = 0, $autoFill = true, $headRowIndex = -1) {
		$ctrl = new TableControl($cols, $rows, $autoFill = true, $headRowIndex);
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function addModal($id = null, $fade = true, $header = true, $body = true, $footer = true) {
		$ctrl = new Modal($id, $fade, $header, $body, $footer);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addPagination($count = 0, $baseUrl = null, $active = 0) {
		$ctrl = new Pagination($count, $baseUrl, $active);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addTabContent() {
		$ctrl = new TabContent();
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addPanel($style = 'default') {
		$ctrl = new Panel($style);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addProgress($style = null, $value = 0) {
		$ctrl = new Progress();
		$this->addControl($ctrl);
		return $ctrl;
	}
}
