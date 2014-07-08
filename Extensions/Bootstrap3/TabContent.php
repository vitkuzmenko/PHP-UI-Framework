<?php

/*
 * Created 22/06/14 by Vitaliy Kuz'menko © 2014
 * All rights reserved.

 * TabContent.php
 * TabContent
 */

namespace Bootstrap;

class TabContent extends BlockControl {
	
	public function __construct() {
		parent::__construct('div');
		$this->addClass('tab-content');
	}

	public function addPane($id, $active = false, $fade = false) {
		$ctrl = $this->addDiv('tab-pane', $id);
		
		if ($active) {
			$ctrl->addClass('active');
		}
		
		if ($fade) {
			$ctrl->addClass('fade');
		}
		
		return $ctrl;
	}

}
