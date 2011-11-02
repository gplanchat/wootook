<?php

class Legacies_Galaxy_Model_System extends Wootook_Core_Collection {

	protected $_eventPrefix = 'galaxy.system';
	protected $_eventObject = 'system';

	protected $_galaxy = null;

	protected $_system = null;

	public function __construct() {
		parent::__construct('galaxy', 'Legacies_Galaxy_Model_Position');
		$this->where('galaxy=:galaxy')->where('system=:system');
	}

	protected function _init() {
		return $this;
	}

	public function setGalaxy($galaxy) {
		$this->_galaxy = $galaxy;
	}

	public function setSystem($system) {
		$this->_system = $system;
	}

	public function _load($galaxy = null, $system = null) {

		if ($galaxy === null) {
			$galaxy = $this->_galaxy;
		}

		if ($system === null) {
			$system = $this->_system;
		}

		if ($galaxy === null  || $system === null) {
			// TODO je sais pas trop quoi mettre comme message d'erreur
			throw new Wootook_Core_Exception_RuntimeException('Undefine galaxy or system');
		}

		// Tableau des coordonnées
		$coords = array('galaxy' => $galaxy, 'system' => $system);

		$this->load($coords);
	}

}