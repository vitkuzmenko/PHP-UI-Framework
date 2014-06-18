<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * List.php
 * List
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class ListControl extends BlockControl {
	
	/**
	 * itemTag - li or dt
	 * 
	 * @var string
	 * @access protected
	 */
	protected $itemTag;   //LI/DT
	
	/**
	 * itemTag2 - For dl only. 
	 * 
	 * @var string
	 * @access protected
	 */
	protected $itemTag2 = 'dd';
	
	/**
	 * listType - disc | circle | square
	 * 
	 * @var string
	 * @access protected
	 */
	protected $listItemType;
	
	public function __construct($parent, $type = 'ul') {
		parent::__construct($parent, $type);
		$this->setType($type);
	}
	
	/**
	 * setType function.
	 * Set list type: ul, ol or dl
	 * 
	 * @access public
	 * @param mixed $type
	 * @return void
	 */
	public function setType($type) {
		switch ($type) {
			case 'ul': 
				$this->tag = "ul";
				$this->itemTag = "li"; 
				break;
			case 'ol': 
				$this->tag = "ol";
				$this->itemTag = "li"; 
				break;
			case 'dl':
				$this->tag = "dl";
				$this->itemTag = "dt"; 				
				break;
		}
	}
	
	/**
	 * setListItemType function.
	 * Set list type item: disc | circle | square
	 * 
	 * @access public
	 * @param mixed $listItemType
	 * @return void
	 */
	public function setListItemType($listItemType) {
		$allowed = array('disc', 'circle', 'square');
		
		if (in_array($listItemType, $allowed)) {
			$this->setAttr('type', $listItemType);
		}
	}
	
	/**
	 * addItem function.
	 * Add item to list
	 * 
	 * @access public
	 * @param mixed $content (default: null)
	 * @return void
	 */
	public function addItem($content = null) {
		$ctrl = new BlockControl($this, $this->itemTag);
		$ctrl->setContent($content);
		$this->AddControl($ctrl);
		return $ctrl;
	}

	/**
	 * addItems function.
	 * Add items from array
	 * 
	 * @access public
	 * @param array $array (default: array())
	 * @return void
	 */
	public function addItems(array $array = array()) {
		foreach ($array as $key => $row) {
			if (is_array($row)) {
				$item = $this->addItem($key);
				$list = $item->addList('ul');
				$list->addItems($row);
			} else {
				$this->addItem($row);
			}
		}
	}
	
}
