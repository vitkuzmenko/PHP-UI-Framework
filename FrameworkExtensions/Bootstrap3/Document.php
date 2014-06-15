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

		$this->head->addCssFile('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css');
		
		$this->head->addJsFile('//code.jquery.com/jquery-1.11.1.min.js');
		$this->head->addJsFile('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js');

		$this->body = new DocumentBody($this);
		$this->AddControl($this->body);
		
	}

}
