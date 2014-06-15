<?php

/*
 * Created 16/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * BlockControl.php
 * BlockControl
 */

namespace Bootstrap;

require_once realpath(dirname(__FILE__)) . '/Bootstrap.php';

class BlockControl extends \PHPUIF\BlockControl {
	
	public function __construct($parent = null, $tag = 'div') {
		parent::__construct($parent, $tag);
	}

	

}
