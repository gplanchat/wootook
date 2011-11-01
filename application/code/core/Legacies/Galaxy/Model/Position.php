<?php

/**
 *
 * Enter description here ...
 * @author Orkin
 *
 */
class Legacies_Galaxy_Model_Position extends Wootook_Core_Entity_SubTable {

	protected $_eventPrefix = 'galaxy.position';
	protected $_eventObject = 'position';
	
	protected $_galaxy = null;
	
	protected $_system = null;
	
	protected $_position = null;
	

	/**
	 * @var array
	 */
	protected static $_instances = array();

	public static function factory($id)
	{
		if ($id === null) {
			return new self();
		}

		$id = intval($id);
		if (!isset(self::$_instances[$id])) {
			$instance = new self();
			$params = func_get_args();
			call_user_func_array(array($instance, 'load'), $params);
			self::$_instances[$id] = $instance;
		}
		return self::$_instances[$id];
	}

	public static function factoryFromCoords($galaxy, $system, $position)
	{
		if ($coords === null || empty($coords)) {
			return new self();
		}

		if (!in_array($type, array(self::TYPE_PLANET, self::TYPE_DEBRIS, self::TYPE_MOON))) {
			$type = self::TYPE_PLANET;
		}

		if (!is_array($coords)) {
			$coords = explode(':', $coords);

			if (count($coords) != 3) {
				return new self();
			}

			$coords = array(
                'galaxy'   => $coords[0],
                'system'   => $coords[1],
                'position' => $coords[2],
                'type'     => $type
			);
		}

		if (!isset($coords['type'])) {
			$coords['type'] = $type;
		}

		$database = Wootook_Database::getSingleton();
		$collection = new Wootook_Core_Collection('planets');
		$collection
		->column('id')
		->where('galaxy=:galaxy')
		->where('system=:system')
		->where('planet=:position')
		->where('planet_type=:type')
		->limit(1)
		->load($coords)
		;

		$planetData = $collection->getFirstItem();

		if ($planetData === null || !$planetData->getData('id')) {
			return new self();
		}

		return self::factory($planetData->getData('id'));
	}

	/**
	 *
	 * Retourne la planete située à la position, s'il n'y a pas de planete la methode retourne null
	 * @return Wootook_Empire_Model_Planet
	 */
	public function getPlanet() {

	}

	/**
	 *
	 * Retourne la lune située à la position, s'il n'y a pas de lune, la methode retourne null
	 * @return Wootook_Empire_Model_Planet
	 */
	public function getMoon() {

	}

	/**
	 *
	 * Retourne l'utilisateur à la position, si la planete n'est pas colonisée la methode retourne null
	 * @return Wootook_Empire_Model_User
	 */
	public function getUser() {

	}

	/**
	 *
	 * Retourne l'alliance du joueur a qui appartient la planete à la position, si le joueur n'a pas d'alliance ou si la planete n'est pas colonisé, la méthode retourne null
	 * @return Wootook_Alliance_Model_Entity
	 */
	public function getAlliance() {

	}
	
	public function getGalaxy() {
		return $this->_galaxy;
	}
	
	public function setGalaxy($galaxy) {
		$this->_galaxy = $galaxy;
	}
	
	public function getSystem() {
		return $this->_system;
	}
	
	public function setSystem($system) {
		$this->_system = $system;
	}
	
	public function getPosition() {
		return $this->_position;
	}
	
	public function setPosition($position) {
		$this->_position = $position;
	}
	
	public function getDebrisAmount($resourceType) {
		
	}
	
	public function setDebrisAmount($resourceType, $amount) {
		
	}

}
