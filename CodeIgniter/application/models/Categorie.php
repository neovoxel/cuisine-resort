<?php

require_once('Categorie_Gateway.php');

class Categorie extends Categorie_Gateway {
	
	private $id_categorie;
	private $nom_categorie;
	private $image_categorie;
	private $nb_recettes;
	
	/*function __construct() {
		parent::__construct();
		$id_categorie = '';
		$nom_categorie = '';
		$image_categorie = '';
		$nb_recettes = '';
	}*/
	
	function __construct($id = -1) {
		parent::__construct();
		if ($id != -1) {
			$data = parent::get($id);
			$id_categorie = $data['id_categorie'];
			$nom_categorie = $data['nom_categorie'];
			$image_categorie = $data['image_categorie'];
			$nb_recettes = $data['nb_recettes'];
		}
		else {
			$id_categorie = '';
			$nom_categorie = '';
			$image_categorie = '';
			$nb_recettes = '';
		}
	}
	
	/*public static function getAll() {
		$data = parent::getAll();
		$categories = array();
		
		foreach ($data as $line)
			$categories[$i] = new Categorie($line['id_categorie']);
		
		return $categories;
	}*/
	
	public function getDataArray() {
		return array('id_categorie' => $id_categorie,
					'nom_categorie' => $nom_categorie,
					'image_categorie' => $image_categorie,
					'nb_recettes' => $nb_recettes);
	}
	
	public function getId() {
		return $id_categorie;;
	}
	
	public function getNom() {
		return $nom_categorie;;
	}
	
	public function getImage() {
		return $image_categorie;;
	}
	
	public function getNb() {
		return $nb_recettes;;
	}
	
}

?>