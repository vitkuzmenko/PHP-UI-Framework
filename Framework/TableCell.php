<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TableCell.php
 * TableCell
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class TableCell extends BlockControl {
	
	public function __construct($parent) {
		
		if ($parent->isHeading) {
			$tag = "th";
		} else {
			$tag = "td";
		}
		
		parent::__construct($parent, $tag);
	}

}
