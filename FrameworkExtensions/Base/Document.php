<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Document.php
 * Document
 */

namespace Bootstrap;

class Document extends \PHPUIF\Document {
	
	public function __construct($title = null, $charset = 'utf-8', $lang = null) {
	
		parent::__construct($title, $charset, $lang);

		$this->body = new DocumentBody($this);
		$this->AddControl($this->body);
		
	}

}
