<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * LinkControl.php
 * LinkControl
 */

namespace PHPUIF;

class LinkControl extends BlockControl {
	
	public $textInSpan;
	
	public $title;
	
	public $textSpan;

	public function __construct($href = null, $title = null) {
		parent::__construct('a');
		
		$this->setHref($href);
		$this->setLinkTitle($title);
	}

	public function setHref($href = null) {
		$this->setAttr('href', $href);
	}

	public function setLinkTitle($value = null) {
		$this->title = $value;
	}
	
	public function textSpan() {
		if ($this->textSpan) {
			return $this->textSpan;
		}
		
		$this->textInSpan = true;

		$ctrl = new BlockControl('span');
		$ctrl->addClass('text');
		$ctrl->addContent($this->title);
		
		$this->textSpan = $ctrl;
		
		return $ctrl;
	}
	
	public function getComplete() {
	
		if ($this->textInSpan) {
			$this->addControl($this->textSpan());
		} else {
			$this->addContent($this->title);
		}
				
		return parent::getComplete();
	}
	
	
}
