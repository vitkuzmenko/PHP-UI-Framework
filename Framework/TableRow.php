<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TableRow.php
 * TableRow
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class TableRow extends OwnedControl {
	
	/**
	 * cellCount
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $cellCount;
	
	/**
	 * isHeading - automatic set tag for row th or td
	 * 
	 * @var mixed
	 * @access public
	 */
	public $isHeading;
	
	public function __construct($parent, $isHeading = false) {
		parent::__construct($parent, 'tr');
		$this->isHeading = $isHeading;
	}
	
	/**
	 * cellCount function.
	 * 
	 * @access public
	 * @return integer
	 */
	public function cellCount() {
		return $this->cellCount;
	}
	
	/**
	 * addCell function.
	 * 
	 * @access public
	 * @param mixed $colspan (default: null)
	 * @param mixed $rowspan (default: null)
	 * @return void
	 */
	public function addCell($colspan = null, $rowspan = null) {
		$ctrl = new TableCell($this);
		$ctrl->setAttr('colspan', $colspan);
		$ctrl->setAttr('rowspan', $rowspan);
		$this->AddControl($ctrl);
		$this->cellCount++;
		return $ctrl;
	}
	
	/**
	 * deleteCell function.
	 * 
	 * @access public
	 * @param mixed $col
	 * @return void
	 */
	public function deleteCell($col) {
		if (is_array($col)) {
			foreach ($col as $key => $value) {
				unset($this->controls[$value]);
				$this->cellcount--;
			}
		} else {
			unset($this->controls[$col]);
			$this->cellcount--;
		}
	}
	
	/**
	 * cell function.
	 * 
	 * @access public
	 * @param mixed $col
	 * @return void
	 */
	public function cell($col) {
		return $this->controls[$col];
	}

	/**
	 * getCells function.
	 * 
	 * @access public
	 * @return array
	 */
	public function getCells() {
		$array = array();
		
		foreach ($this->controls as $ctrl) {
			if (($ctrl->tag == 'td') || ($ctrl->tag == 'th')) {
				array_push($array, $ctrl);
			}
		}
		
		return $array;
	}

	/**
	 * fill function.
	 * 
	 * @access public
	 * @param array $values (default: array())
	 * @return void
	 */
	public function fill(array $values = array()) {
		$cells = $this->getCells();
		
		for ($i = 0; (($i < count($values)) && ($i < $this->cellCount)); $i++) {
			$cells[$i]->setContent($values[$i]);
		}
		
	}

}
