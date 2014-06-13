<?php

/*
 * Created 12/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * AttrController.php
 * AttrController
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class AttrController extends ObjectController {
	
	/**
	 * attributes - Contains all added attributes in array
	 * 
	 * (default value: array())
	 * 
	 * @var array
	 * @access protected
	 */
	protected $attributes = array();
	
	public function __construct($parent) {
		parent::__construct($parent);
	}
	
	/**
	 * safeAttrValue function.
	 * Safe and clean attribute value
	 * 
	 * @access private
	 * @param mixed $value
	 * @return string
	 */
	private function safeAttrValue($value) {
		return str_replace('"', '&quot;', $value);
	}
	
	/**
	 * hasAttr function.
	 * Check for exist attribute in current control or no
	 * 
	 * @access public
	 * @param mixed $key
	 * @return bool
	 */
	public function hasAttr($key) {
		return array_key_exists($key, $this->attributes);
	}
	
	/**
	 * setAttr function.
	 * 
	 * @access public
	 * @param mixed $key
	 * @param mixed $value
	 * @return void
	 */
	public function setAttr($key, $value) {
		if (is_null($value) == false) {
			$this->attributes[$key] = $this->safeAttrValue($value);
		}
	}
	
	/**
	 * removeAttr function.
	 * Remove attribute from current control
	 * 
	 * @access public
	 * @param mixed $key
	 * @return void
	 */
	public function removeAttr($key) {
		if ($this->hasAttr($key) == false) {
			unset($this->attributes[$key]);
		}
	}

	/**
	 * attrValue function.
	 * Returns value for attribute
	 * 
	 * @access public
	 * @param mixed $key
	 * @return string
	 */
	public function attrValue($key) {
		if ($this->hasAttr($key)) {
			return $this->attributes[$key];
		}
	}
	
	/**
	 * attrInString function.
	 * Returns completed attribute in string
	 * 
	 * @access public
	 * @param mixed $key
	 * @return string
	 */
	public function attrInString($key) {
		if ($this->hasAttr($key)) {
			$value = $this->attrValue($key);
			
			$attribute = sprintf('%s="%s"', $key, $value);
			
			return $attribute;
		}
	}

	/**
	 * attrsInString function.
	 * Returns all attributes in string
	 * 
	 * @access public
	 * @return void
	 */
	public function attrsInString() {
		$items = array();
		
		foreach ($this->attributes as $key => $value) {
			array_push($items, $this->attrInString($key));
		}
		
		$string = implode(' ', $items);
		
		if ($string) {
			$string = ' ' . $string;
		}
		
		return $string;
	}
}
