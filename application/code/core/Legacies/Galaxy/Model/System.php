<?php

class Legacies_Galaxy_Model_System extends Wootook_Core_Collection {
	
	protected $_eventPrefix = 'galaxy.system';
	protected $_eventObject = 'system';
	
	public function __construct() {
		parent::__construct('galaxy', 'Legacies_Galaxy_Model_Position');
	}
	
	protected function _init() {
		return $this;
	}
	
}