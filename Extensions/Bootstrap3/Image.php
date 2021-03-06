<?php

/*
 * Created 18/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Image.php
 * Image
 */

namespace Bootstrap;

class Image extends \PHPUIF\Image {
	
	public $style;
	
	public function setImageStyle($style = null) {
		$this->style = $style;
	}
	
	public function setRoundedStyle() {
		$this->setImageStyle('rounded');
	}
	
	public function setCircleStyle() {
		$this->setImageStyle('circle');
	}
	
	public function setThumbnaiStylel() {
		$this->setImageStyle('thumbnail');
	}

	public function getComplete() {
	
		if ($this->style) {
			$this->addClass(sprintf('img-%s', $this->style));
		}
		
		return parent::getComplete();
	}
	
}
