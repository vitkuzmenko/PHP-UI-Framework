<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * MenuItem.php
 * MenuItem
 */

namespace Bootstrap;

class MenuItem extends BlockControl {
	
	public $title;
	
	public $href;
	
	public $active;
	
	public $disabled;
	
	public $header = false;
	
	public $link;
	
	public $menu;
	
	protected $badge;
	
	public function __construct($parent, $title = null, $href = null, $active = false, $disabled = false, $header = false) {
		parent::__construct($parent, 'li');
		
		$this->setTitle($title);
		$this->setHref($href);
		
		$this->setActive($active);
		$this->setDisabled($disabled);
		$this->setHeader($header);
	}
	
	public function setTitle($title = null) {
		$this->title = $title;
	}
	
	public function setHref($href = null) {
		$this->href = $href;
	}
	
	public function setBadge($value = null) {
		$this->badge = $value;
		return $this;
	}
	
	private function initLink($href = null, $title = null) {
		$this->link = new \PHPUIF\LinkControl($this, $href, $title);
		return $this->link;
	}

	public function setHeader($bool = false) {
		$this->header = $bool;
	}
	
	public function setDisabled($bool = true) {
		$this->disabled = $bool;
	}
	
	public function setActive($bool = true) {
		$this->active = $bool;
	}
	
	// !Dropdown
	
	public function addDropdown($inGroup = false) {
		$this->menu = new DropdownMenu($this);
		return $this->menu;
	}
	
	/**
	 * addItem function.
	 * Adding item to dropdownmenu
	 * 
	 * @access public
	 * @param mixed $title (default: null)
	 * @param mixed $href (default: null)
	 * @param bool $active (default: false)
	 * @param bool $disabled (default: false)
	 * @param bool $header (default: false)
	 * @return void
	 */
	public function addItem($title = null, $href = null, $active = false, $disabled = false, $header = false) {
		return $this->menu->addItem($title, $href, $active, $disabled, $header);
	}
	
	/**
	 * addHeaderItem function.
	 * 
	 * @access public
	 * @param mixed $title
	 * @return void
	 */
	public function addHeaderItem($title) {
		return $this->menu->addHeaderItem($title);
	}

	/**
	 * addDivider function.
	 * 
	 * @access public
	 * @return void
	 */
	public function addDivider() {
		return $this->menu->addDivider();
	}


	private function setLinkAttributes() {
		$link = $this->initLink($this->href, $this->title);
		$this->addControl($link);
		
		if ($this->menu) {
			$this->addClass('dropdown');
			$this->link->addClass('dropdown-toggle');
			$this->link->setAttr('data-toggle', 'dropdown');
			$this->link->addSpan('caret');
			$this->addControl($this->menu);
		}

		if ($this->badge) {
			$this->link->addSpan('badge pull-right', null, $this->badge);
		}
		
		if ($this->disabled) {
			$this->addClass('disabled');
		}
		
		if ($this->active) {
			$this->addClass('active');
		}
		
	}

	public function getComplete() {
		if ($this->header) {
			$this->setContent($this->title);
			$this->addClass('dropdown-header');
		} else {
			$this->setLinkAttributes();
		}
	
		return parent::getComplete();
	}

}
