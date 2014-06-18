<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Image.php
 * Image
 */

namespace PHPUIF;

class Image extends BlockControl {
	
	public function __construct($parent, $src = null, $alt = null, $title = null) {
		parent::__construct($parent, 'button');

		$this->hasClose= false;
		
		$this->setSrc($src);
		$this->setAlt($alt);
		$this->setTitle($title);
		
	}

	public function setAlt($value = null) {
		$this->setAttr('alt', $value);
	}
	
	public function setSrc($image) {
		$this->setAttr('src', $image);
	}
	
	public function setSize($width, $height) {
		
		$size = array(
			'width' => $width,
			'height' => $height
		);
		
		$this->setAttrs($size);
	}
	
}
