<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TableRow.php
 * TableRow
 */

namespace Bootstrap;

class TableRow extends \PHPUIF\TableRow {

	public $style;

	public function __construct($isHeading = false) {
		parent::__construct('tr');
		$this->isHeading = $isHeading;
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
	
	public function setRowStyle($style = null) {
		$this->style = $style;
		return $this;
	}
	
	public function setActiveStyle() {
		return $this->setRowStyle('active');
	}

	public function setSuccessStyle() {
		return $this->setRowStyle('success');
	}

	public function setWarningStyle() {
		return $this->setRowStyle('warning');
	}

	public function setDangerStyle() {
		return $this->setRowStyle('danger');
	}

	public function setInfoStyle() {
		return $this->setRowStyle('info');
	}

	public function getComplete() {
		
		if ($this->style) {
			$this->addClass($this->style);
		}
		
		return parent::getComplete();
	}

}
