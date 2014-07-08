<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * DocumentBody.php
 * DocumentBody
 */

namespace Bootstrap;

require_once realpath(dirname(__FILE__)) . '/Bootstrap.php';

class DocumentBody extends BlockControl {
	
	public function __construct() {
		parent::__construct();
		$this->tag = 'body';
		
	}

}
