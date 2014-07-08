<?php

/*
 * Created 20/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Modal.php
 * Modal
 */

namespace Bootstrap;

class Modal extends BlockControl {
	
	public $fade;
	
	public $modalDialog;
	
	public $modalContent;
	
	public $modalHeader;
	
	public $modalBody;
	
	public $modalFooter;
	
	public $showCloseButton = true;
	
	public function __construct($id = null, $fade = true, $header = true, $body = true, $footer = true) {
		parent::__construct('div');
	
		$this->setId($id);
		
		$this->addClass('modal');
		
		$this->fade = $fade;
		
		$this->modalDialog();
		$this->modalContent();
		
		if ($header) {
			$this->modalHeader();
		}
		
		if ($body) {
			$this->modalBody();
		}
		
		if ($footer) {
			$this->modalFooter();
		}
		
	}
	
	public function setFade($bool = true) {
		$this->fade = $bool;
	}
	
	public function setShowCloseButton($bool = true) {
		$this->showCloseButton = $bool;
	}
	
	public function modalDialog() {
		
		if ($this->modalDialog) {
			return $this->modalDialog;
		}
		
		$this->modalDialog = $this->addDiv('modal-dialog');
		return $this->modalDialog;
	}

	public function modalContent() {
		if ($this->modalContent) {
			return $this->modalContent;
		}

		$this->modalContent = $this->modalDialog->addDiv('modal-content');
		return $this->modalContent;
	}

	public function modalHeader() {
		if ($this->modalHeader) {
			return $this->modalHeader;
		}

		$this->modalHeader = $this->modalContent->addDiv('modal-header');
		return $this->modalHeader;
	}

	public function modalBody() {
		if ($this->modalBody) {
			return $this->modalBody;
		}

		$this->modalBody = $this->modalContent->addDiv('modal-body');
		return $this->modalBody;
	}

	public function modalFooter() {
		if ($this->modalFooter) {
			return $this->modalFooter;
		}

		$this->modalFooter = $this->modalContent->addDiv('modal-footer');
		return $this->modalFooter;
	}
	
	public function addCloseButton($id = null) {
		$button = $this->modalHeader()->addCloseButton();
		$button->setAttr('data-dismiss', 'modal');
		return $button;
	}


	public function getComplete() {
		
		if ($this->fade) {
			$this->addClass('fade');
		}
				
		return parent::getComplete();
	}

}
