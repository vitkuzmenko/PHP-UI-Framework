<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TableControl.php
 * TableControl
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class TableControl extends BlockControl {
	
	protected $cols;
	
	protected $rows;
	
	protected $headRow;
	
	protected $isFilled;
	
	public function __construct($cols = 0, $rows = 0, $autoFill = true, $headRow = -1) {
		parent::__construct('table');
		
		$this->headRow = $headRow;
		$this->cols = $cols;
		$this->rows = $rows;
		
		if ($autoFill) {
			$this->fillTable();
		}
	}
	
	public function setHeadRowIndex($value = 0) {
		$this->headRow = $value;
	}
	
	public function setBorder($value) {
		$this->setAttr('border', $value);
	}
	
	public function setWidth($value) {
		$this->setAttr('width', $value);
	}
	
	public function setCellPadding($value) {
		$this->setAttr('cellpadding', $value);
	}

	public function setCellSpacing($value) {
		$this->setAttr('cellspacing', $value);
	}
	
	protected function createRow($isHead = false) {
		$ctrl = new TableRow($isHead);
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
		
		$this->isFilled = true;
	}

	public function addRow(array $value = array(), $isHeading = false) {
		$row = $this->createRow($isHeading);
		
		$this->cols = count($value);
		
		$this->rows++;
		
		for ($i = 0; $i < $this->cols; $i++) {
			$cell = $row->addCell();
		}
		
		$row->fill($value);
		
		return $row;
	}
	
	public function addRowControl($ctrl) {
		$this->rows++;
		$this->addControl($ctrl);
		return $ctrl;
	}
	
	public function row($rowIndex) {
		if (!$this->isFilled) {
			return null;
		}
		
		$rows = $this->getControls('tr');
		
		return $rows[$rowIndex];
	}
	
	public function fillRow($rowId, array $value = array()) {
		$row = $this->row($rowId);
		if ($row) {
			$row->fill($value);
		}
	}
	
	public function cell($row, $col) {
		if (!$this->isFilled) {
			return false;
		}
		
		$rows = $this->getControls('tr');
		
		$cells = $rows[$row]->getCells();
		$cell = $cells[$col];
		
		return $cell;
	}
}
