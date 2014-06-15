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
	
	public function __construct($parent = null, $tag = 'div') {
		parent::__construct($parent, $tag);
	}
	
	public function addContent($content = null) {
		$ctrl = new BlockControl($this, null);
		$ctrl->clear = true;
		$ctrl->setContent($content);
		$this->addControl($ctrl);
		return $ctrl;		
	}
	
	public function addSimple($tag) {
		$ctrl = new BlockControl($this, $tag);
		$ctrl->hasClose = false;
		$this->AddControl($ctrl);
		return $ctrl;
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

	public function addHeader($level, $value) {
		return $this->addBlock(sprintf('h%d', $level), null, null, $value);
	}
	
	public function addLink($href, $title = null, $class = null, $hint = null) {
	
		if ($title == null) {
			$title = $href;
		}
		
		$ctrl = $this->addBlock('a', $class, null, $title);
		$ctrl->setAttr('href', $href);
		$ctrl->setAttr('title', $hint);
		
		return $ctrl;
	}
	
	public function addImage($src, $alt = null, array $size = array()) {
		
		$ctrl = $this->addBlock('img');
		$ctrl->hasClose = false;
		$ctrl->setAttr('src', $src);
		$ctrl->setAttr('alt', $alt);
		
		if (is_array($size) && count($size) == 2) {
			$ctrl->setAttr('width', $size[0]);
			$ctrl->setAttr('height', $size[1]);
		}

		return $ctrl;
	}

	public function addButton($title, $type = 'button', $class = null) {
	
		$ctrl = $this->addBlock('button', $class, null, $title);
		$ctrl->setAttr('type', $type);
		return $ctrl;
	}
	
	public function addForm($method, $name, $action = null, $nameAsId = true) {
		$ctrl = new Form($this, $method, $name, $action, $nameAsId);
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function addTable($cols = 0, $rows = 0, $autoFill = true, $headRowIndex = -1) {
		$ctrl = new TableControl($this, $cols, $rows, $autoFill = true, $headRowIndex);
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function addList($type = 'ul') {
		$ctrl = new ListControl($this, $type);
		$this->AddControl($ctrl);
		return $ctrl;
	}
	
	public function addJSBlock($script) {
		$ctrl = $this->addBlock('script', null, null, $script);
		$ctrl->setAttr('type','text/javascript');
		return $ctrl;
	}

	public function addJSFile($file) {
		$ctrl = $this->addBlock('script', null, null, $script);
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
