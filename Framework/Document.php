<?php

/*
 * Created 13/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * Document.php
 * Document
 */

namespace PHPUIF;

require_once realpath(dirname(__FILE__)) . '/PHPUIFramework.php';

class Document extends OwnedControl {
	
	protected $docType = '<!DOCTYPE html>';
	
	protected $title;
	
	public $head;
	
	public $body;
	
	public function __construct($title = null, $charset = 'utf-8', $lang = null, $initBody = true) {
			
		parent::__construct(null);
		
		$this->tag = "html";
		$this->parentcontrol = null;
		$this->title = $title;
		
		$this->setAttr('lang', $lang);
		
		$this->head = new DocumentHead($this, $this->title, $charset);
		$this->AddControl($this->head);
		
		if ($initBody) {
			$this->body = new DocumentBody($this);
			$this->AddControl($this->body);			
		}
	}

	public function setKeywords($value) {
		if ($val != null) {
			$this->head->deleteMeta('name', 'keywords');
			$this->head->addMetaName('keywords', $value);
		}
	}
	
	public function addKeywords($value) {
		$array = $this->head->getControls('meta', 'name', 'keywords');
		
		if (count($ctrls) > 0) {
			$ctrl = $array[0];
			
			$keywords = $ctrl->attrValue('content');
			$keywords .= ', ' . $value;
			
			$this->setKeywords($keywords);
		} else {
			$this->SetKeywords($value);
		}
	}
	
	public function setDescription($value) {
		if ($val != null) {
			$this->head->deleteMeta('name', 'description');
			$this->head->addMetaName('description', $value);
		}
	}

	public function setTitle($valeu) {
		$this->head->setTitle($value);
	}
	
	public function getComplete() {
		return $this->docType . "\n" . parent::getComplete();
	}
	
	public function printAll() {
		print($this->getComplete());
	}

}
