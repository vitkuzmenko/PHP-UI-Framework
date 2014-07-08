<?php

/*
 * Created 20/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TableControl.php
 * TableControl
 */

namespace Bootstrap;

class TableControl extends \PHPUIF\TableControl {
	
	public $stripped = false;
	
	public $bordered = false;
	
	public $hover = false;
	
	public $condensed = false;
	
	public function __construct($cols = 0, $rows = 0, $autoFill = true, $headRow = -1) {
		parent::__construct($cols, $rows, $autoFill, $headRow);
		$this->addClass('table');
		
	}
	
	public function setStripped($value = true) {
    	$this->stripped = $value;
	}

	public function setBordered($value = true) {
    	$this->bordered = $value;
	}

	public function setHover($value = true) {
    	$this->hover = $value;
	}

	public function setCondensed($value = true) {
    	$this->condensed = $value;
	}
	
	public function addTableClass($class = null) {
		if ($class) {
			$this->addClass(sprintf('table-%s', $class));
		}
	}
	
	protected function createRow($isHead = false) {
		$ctrl = new TableRow($isHead);
		$this->AddControl($ctrl);
		return $ctrl;
	}

	public function getComplete() {
		
		if ($this->stripped) {
			$this->addTableClass('striped');
		}	

		if ($this->bordered) {
			$this->addTableClass('bordered');
		}	

		if ($this->hover) {
			$this->addTableClass('hover');
		}	

		if ($this->condensed) {
			$this->addTableClass('condensed');
		}	
	
		return parent::getComplete();
	}

}
