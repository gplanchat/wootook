<?php

/**
 * 
 * Enter description here ...
 * @author Orkin
 *
 */
class Legacies_Galaxy_Model_Position extends Wootook_Core_Entity_SubTable {
	
	private $moon;
	
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
}
