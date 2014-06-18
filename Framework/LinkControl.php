<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * LinkControl.php
 * LinkControl
 */

namespace PHPUIF;

class LinkControl extends BlockControl {
	
	public function __construct($parent, $href = null, $title = null) {
		parent::__construct($parent, 'a');
		
		$this->setHref($href);
		$this->setLinkTitle($title);
	}

	public function setHref($href = null) {
		$this->setAttr('href', $href);
	}

	public function setLinkTitle($value = null) {
		$this->setContent($value);
	}
}
