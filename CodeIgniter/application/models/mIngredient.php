<?php

class mIngredient extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($id) {
		$query = $this->db->get_where('Ingredient', array('id_ingredient' => $id));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getByName($nom_ingredient) {
		$query = $this->db->get_where('Ingredient', array('nom_ingredient' => $nom_ingredient));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getAll() {
		$query = $this->db->get('Ingredient');
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function update($id, $nom_ingredient, $image_ingredient) {
		
	}
	
	public function insert($nom_ingredient) {
		$data = array(
		   'nom_ingredient' => $nom_ingredient
		);
		
		$this->db->insert('Ingredient', $data);	// Insertion de la recette
		return $this->db->insert_id();
	}
	
	public function delete($id) {
		
	}	
}

?>
