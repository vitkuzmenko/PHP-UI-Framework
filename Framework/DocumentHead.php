<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * DocumentHead.php
 * DocumentHead
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class DocumentHead extends BlockControl {

	protected $title;
	
	public function __construct($title = null, $charset = 'utf-8') {
		parent::__construct('head');
		
		$this->setTitle($title);
		$this->addMetaHttp('Content-Type', 'text/html; charset=' . $charset);
	}
	
	public function addCssFiles(array $list = array()) {
		foreach($list as $file) {
			$this->addCssFile($file);
		}
	}
		
	public function addCssFile($file) {
		$ctrl = new BlockControl('link');
		$ctrl->hasClose = false;
		$ctrl->setAttr('rel','stylesheet');
		$ctrl->setAttr('href', $file);
		$ctrl->setAttr('type','text/css');		
		$this->addControl($ctrl);
	}
	
	public function setTitle($title = null) {
		$ctrl = $this->getFirstControl('title');
		
		if (!$ctrl) {
			$ctrl = new BlockControl('title');
			$this->addControl($ctrl);
		}
		
		$ctrl->setContent($title);
	}
	
	public function addMeta($attribute, $attributeValue, $content) {
		$ctrl = $this->addBlock('meta');
		$ctrl->hasClose = false;
		$ctrl->setAttr($attribute, $attributeValue);
		$ctrl->setAttr('content', $content);
	}

	public function addMetaHttp($type, $content) {
		$this->addMeta('http-equiv', $type, $content);
	}
	
	public function addMetaName($type, $content) {
		$this->addMeta('name', $type, $content);
	}

	public function deleteMeta($attribute, $attributeValue) {
		$array = $this->getControls('meta', $attribute, $attributeValue);
		foreach ($array as $ctrl) {
			$this->freeControl($ctrl);
		}
	}
	
	public function addFavIcon($file) {
		$ctrl = new BlockControl('link');
		$ctrl->setAttr('rel','SHORTCUT ICON');
		$ctrl->setAttr('href', $file);
		$ctrl->setAttr('type', 'image/png');
		$ctrl->hasclose = false;
		$this->addControl($ctrl);

	}
}
