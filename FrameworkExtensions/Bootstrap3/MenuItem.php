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

	private function setLinkAttributes() {
		$link = $this->initLink($this->href, $this->title);
		$this->addControl($link);
		
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
