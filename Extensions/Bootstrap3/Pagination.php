<?php

/*
 * Created 21/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Pagination.php
 * Pagination
 */

namespace Bootstrap;

class Pagination extends \PHPUIF\ListControl {
	
	public $count;
	
	public $baseUrl;
	
	public $active;
	
	public $items = 10;
	
	public function __construct($count = 0, $baseUrl = null, $active = 0) {
		parent::__construct('ul');
		$this->addClass('pagination');
		
		$this->setCount($count);
		$this->setBaseUrl($baseUrl);
		$this->setActive($active);
	}

	public function setCount($value = 0) {
		$this->count = $value;
		return $this;
	}
	
	public function setBaseUrl($value = null) {
		$this->baseUrl = $value;
		return $this;
	}
	
	public function setActive($value = 0) {
		$this->active = $value;
		return $this;
	}

	public function addItem($title = null, $href = null, $active = false, $disabled = false) {
		$ctrl = new MenuItem($title, $href, $active, $disabled);
		$this->addControl($ctrl);
		return $ctrl;
	}

	public function getUrl($value) {
		return sprintf($this->baseUrl, $value);
	}

	public function getComplete() {
	
		$item = $this->addItem('Первая', $this->getUrl(1));
		if ($this->active == 1) {
			$item->setDisabled();
		}
		
		$previous = $this->active - 1;
		
		if ($previous < 1) {
			$previous = 1;
		}
		
		$item = $this->addItem('&laquo;', $this->getUrl($previous));
		if ($this->active == 1) {
			$item->setDisabled();
		}
				
		$semi = intval($this->items / 2);
		
		$from = $this->active - $semi;
		
		$to = $this->active + $semi;
		
		if ($from < 1) {
			$from = 1;
			$to = $this->items;
		}
		
		if ($to > $this->count) {
			$from = $this->count - $this->items;
			$to = $this->count;
		}

		if ($from < 1) {
			$from = 1;
		}
		
		for ($i = $from; $i <= $to; $i++) {
			
			$link = $this->getUrl($i);
			
			$item = $this->addItem($i, $link, $i == $this->active);
			
		}
		
		$next = $this->active + 1;
		
		if ($next > $this->count) {
			$next = $this->count;
		}
		
		$item = $this->addItem('&raquo;', $this->getUrl($next));
		if ($this->active == $this->count) {
			$item->setDisabled();
		}
		
		$item = $this->addItem('Последняя', $this->getUrl($this->count));
		if ($this->active == $this->count) {
			$item->setDisabled();
		}
			
		return parent::getComplete();
	}
	

}
