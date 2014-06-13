<?php

/*
 * Created 12/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * OwnedControl.php
 * OwnedControl
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class OwnedControl extends Control {
	
	protected $controls;    //array;
	
	public $endContent;  //text between last child close tag and this element close tags
	
	//NOTE: text from $content placed between this element open tag and first child open tag
	
	public function __construct($parent, $tag = null) {
		parent::__construct($parent, $tag);
		
		$this->controls = array();
		$this->endcontent = null;
	}
	
	public function controlCount() {
		return count($this->controls);
	}
	
	public function hasChild() {
		return ($this->controlCount() > 0);
	}
	
	public function addControl($ctrl) {
		array_push($this->controls, $ctrl);
		$ctrl->parentControl = $this;
		return $ctrl;
	}
	
	public function createChildControl($tag) {
		$ctrl = new Control($this, $tag);
		array_push($this->controls, $ctrl);
		return $ctrl;
	}
	
	public function createControl($tag) {
		$ctrl = new OwnedControl($this, $tag);
		array_push($this->controls, $ctrl);
		return $ctrl;
	}
	
	public function getControl($name) {
		foreach ($this->controls as $ctrl) {
			if ($ctrl->name == $name) { 
				return $ctrl; 
			}
		}
		return false;
	}
	
	public function getControls($tag, $attr = "", $attrValue = "") {
		$array = array();
		
		foreach ($this->controls as $ctrl) {
			if (($ctrl->tag == $tag) && (!$attr || $ctrl->hasAttr($attr, $attrValue))) {
				array_push($array, $ctrl);
			}
		}
		
		return $array;
	}
	
	public function freeControl($ctrl) {
		foreach($this->controls as $key => $value) {
			if ($value === $ctrl) {
				unset($this->controls[$key]);
			}
		}
	}
	
	public function getFirstControl($tag) {
		foreach ($this->controls as $ctrl) {
			if ($ctrl->tag == $tag) {
				return $ctrl;
			}
		}
		return null;
	}
	
	public function getComplete() {

		if (is_array($this->content)) {
			return null;
		}
		
		$content = $this->getOpenTag().$this->content;
		
		foreach ($this->controls as $ctrl) {
			$ctrl->tabSpaceLevel = $ctrl->parentControl->tabSpaceLevel() . $this->tabSpace();
			$content .= $this->offset() . $ctrl->tabSpaceLevel() . $ctrl->GetComplete();
		}
		
		$complete = $content . $this->endContent;
		
		if ($this->hasChild()) {
			$complete .= $this->offset() . $this->tabSpaceLevel();
		}
		
		$complete .= $this->GetCloseTag();
		
		return $complete;
	}

}
