<?php

/*
 * Created 12/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Control.php
 * Control
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class Control extends ComponentController {
	
	protected $tag;          //e.g. input
	
	protected $attrController;        //array
	
	protected $hasClose;     //has close tag or not
	
	protected $prettyCode = true;
	
	protected $offset = "\n";
	
	protected $tabSpace = '    ';
	
	protected $tabSpaceLevel;
	
	public $content;         //text between open and close tags
	
	public $clean;       //don't output this element tags (useful for DOM innerhtml method)
	
	
	public function __construct($parent, $tag = null) {
		parent::__construct($parent);
		
		$this->attrController = new AttrController($this);
		
		$this->tag        = $tag;
		$this->hasClose   = true;
		$this->clean      = false;
	}
	
	public function offset() {
		if ($this->prettyCode) {
			return $this->offset;
		} else {
			return null;
		}
	}
	
	public function tabSpace() {
		if ($this->prettyCode) {
			return $this->tabSpace;
		} else {
			return null;
		}
	}
	
	public function tabSpaceLevel() {
		if ($this->prettyCode) {
			return $this->tabSpaceLevel;
		} else {
			return null;
		}
	}
	
	public function setAttr($key, $value) {
		$this->attrController->setAttr($key, $value);
		return $this;
	}
	
	public function removeAttr($key) {
		$this->attrController->removeAttr($key);
	}
	
	// !Class Atribute Managment
	
	public function setClass($value) {
		if (is_array($value)) {
			$value = implode(' ', $value);
		}
		
		$this->setAttr('class', $value);
		
		return $this;
	}
	
	public function addClass($value) {
	
		if ($this->attrController->hasAttr('class')) {
			$currentClass = $this->attrController->attrValue('class');
		} else {
			$currentClass = '';
		}
		
		$curretClassArray = explode(' ', $currentClass);
		
		$addedClassArray = explode(' ', $value);
		
		foreach ($curretClassArray as $currentClassItem) {
			foreach ($addedClassArray as $key => $addedClassItem) {
				if ($currentClassItem == $addedClassItem) {
					unset($addedClassArray[$key]);
				}
			}
		}
		
		$mergedClassArray = array_merge($curretClassArray, $addedClassArray);
		$classInString = implode(' ', $mergedClassArray);
		
		$this->setAttr('class', $classInString);
		
		return $this;
	}
	
	public function removeClass($class) {
	
		if (is_array($class)) {
			$this->removeClassWithArray($class);
			
			return;
		}
	
		if ($this->hasClass($class) == false) {
			return;
		}
		
		$currentClass = $this->attrController->attrValue('class');

		$newClasses = str_replace($class, '', $currentClass);
		
		$this->setAttr('class', $newClasses);
		
		return $this;
	}
	
	public function removeClassWithArray(array $array = array()) {
		foreach ($array as $item) {
			$this->removeClass($item);
		}
	}
	
	public function hasClass($class) {
		if ($this->attrController->hasAttr('class')) {
			$currentClass = $this->attrController->attrValue('class');
		} else {
			$currentClass = '';
		}
		
		if (strpos($currentClass, $class) !== false) {
			return true;
		} else {
			return false;
		}
	}

	// !Other HTML Attributes

	public function setId($value) {
		$this->setAttr('id', $value);
		return $this;
	}
	
	public function setTitle($value) {
		$this->setAttr('title', $value);
		return $this;
	}
	
	public function setStyle($value) {
		$this->setAttr('style', $value);
		return $this;
	}
	
	public function setDisabled($disabled = true) {
		if ($disabled) {
			if ($this->attrController->hasAttr('disabled')) {
				$this->attrController->removeAttr('disabled');
			}			
		} else {
			$this->setAttr('disabled', 'disabled');
		}
		return $this;
	}

	public function setOnClick($value) {
		$this->setAttr('onclick', $action);
		return $this;
	}
	
	public function setAttrs(array $array = array()) {
		foreach ($array as $key => $value) {
			$this->setAttr($key, $value);
		}
		return $this;
	}
	
	public function hasAttr($key) {
		return $this->attrController->hasAttr($key);
	}
	
	public function setContent($content) {
		$this->content = $content;
	}
	
	public function getOpenTag() {
		if ($this->clean) {
			return null;
		}
		
		$attributes = $this->attrController->attrsInString();
		
		if ($this->hasClose == false) {
			$attributes .= ' /';
		}
		
		return sprintf('<%s%s>', $this->tag, $attributes);
	}
	
	public function getCloseTag() {
		if ($this->hasClose == false) {
			return null;
		}

		return sprintf("</%s>", $this->tag);
	}
	
	public function getComplete() {
		return $this->getOpenTag() . $this->content . $this->getCloseTag();
	}

}
