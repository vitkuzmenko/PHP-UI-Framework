<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TableControl.php
 * TableControl
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class TableControl extends OwnedControl {
	
	protected $cols;
	
	protected $rows;
	
	protected $headRow;
	
	protected $isFilled;
	
	public function __construct($parent, $cols, $rows, $autoFill = true, $headRow = -1) {
		parent::__construct($parent, $tag);
		
		$this->headRow = $headrow;
		$this->cols = $cols;
		$this->rows = $rows;
		
		if ($autoFill) {
			$this->fillTable();
		}
	}
	
	protected function createRow($isHead = false) {
		$ctrl = new TableRow($this, $isHead);
		$this->AddControl($ctrl);
		return $ctrl;
	}
	
	protected function fillTable() {
		for ($i = 0; $i < $this->rows; $i++) {
		
			$isHeadRow = ($this->headRow == $i);
			
			$row = $this->createRow($isHeadRow);
			
			for ($j = 0; $j < $this->cols; $j++) {
				$cell = $row->addCell();
			}
		}
		
		$this->isfilled = true;
	}

	public function addRow(array $value = array(), $isHeading = false) {
		$row = $this->createRow($isHeading);
		
		$this->rows++;
		
		for ($i = 0; $i < $this->cols; $i++) {
			$cell = $row->addCell();
		}
		
		$row->fill($value);
		
		return $row;
	}
	
	public function row($rowId) {
		if (!$this->isFilled) {
			return false;
		}
		
		$rows = $this->getControls('tr');
		
		return $rows[$rowid];
	}
	
	public function fillRow($rowId, array $value = array()) {
		$row = $this->row($rowId);
		$row->fill($value);
	}
	
	public function cell($col, $row) {
		if (!$this->isfilled) {
			return false;
		}
		
		$rows = $this->getControls('tr');
		
		$cells = $rows[$row]->getCells();
		$cell = $cells[$col];
		
		return $cell;
	}
}
