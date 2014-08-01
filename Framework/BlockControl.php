<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * BlockControl.php
 * BlockControl
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class BlockControl extends OwnedControl {
	
	public function __construct($tag = 'div') {
		parent::__construct($tag);
	}
	
	public function addContent($content = null) {
		$ctrl = new BlockControl(null);
		$ctrl->clean = true;
		$ctrl->setContent($content);
		$this->addControl($ctrl);
		return $ctrl;		
	}
	
	public function addSimple($tag) {
		$ctrl = new BlockControl($tag);
		$ctrl->hasClose = false;
		$this->AddControl($ctrl);
		return $ctrl;
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

	public function addHeader($level, $value, $class = null) {
		return $this->addBlock(sprintf('h%d', $level), $class, null, $value);
	}
	
	public function addLink($href, $title = null, $class = null, $hint = null) {
		$ctrl = new LinkControl($href, $title);
		$ctrl->addClass($class);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addImage($src, $alt = null, array $size = array()) {
		$ctrl = new Image($src, $alt);
		if ($size) {
			$ctrl->setSize($size[0], $size[1]);
		}
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function addButton($title, $type = 'button', $class = null) {
	
		$ctrl = $this->addBlock('button', $class, null, $title);
		$ctrl->setAttr('type', $type);
		return $ctrl;
	}
	
	public function addForm($method, $name, $action = null, $nameAsId = true) {
		$ctrl = new Form($method, $name, $action, $nameAsId);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addTable($cols = 0, $rows = 0, $autoFill = true, $headRowIndex = -1) {
		$ctrl = new TableControl($cols, $rows, $autoFill = true, $headRowIndex);
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function addList($type = 'ul') {
		$ctrl = new ListControl($type);
		$this->AddControl($ctrl);
		return $ctrl;
	}
	
	public function addJSBlock($script) {
		$ctrl = $this->addBlock('script', null, null, $script);
		$ctrl->setAttr('type','text/javascript');
		return $ctrl;
	}

	public function addJSFile($file) {
		$ctrl = $this->addBlock('script');
		$ctrl->setAttr('type','text/javascript');
		$ctrl->setAttr('src', $file);
		return $ctrl;
	}
	
	public function addJsFiles(array $list = array()) {
		foreach($list as $file) {
			$this->addJsFile($file);
		}
	}

	public function addCssBlock($cssCode) {
		$ctrl = $this->addBlock('style', null, null, $cssCode);
		$ctrl->setAttr('type','text/css');
		return $ctrl;
	}

}
