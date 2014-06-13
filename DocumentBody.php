<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * DocumentBody.php
 * DocumentBody
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class DocumentBody extends BlockControl {
	
	public function __construct($parent) {
		parent::__construct($parent);
		$this->tag = 'body';
	}

}
