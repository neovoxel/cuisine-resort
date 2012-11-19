<?php

class mCategorie extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	protected function get($id) {
		$query = $this->db->get_where('Categorie', array('id_categorie' => $id));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getAll() {
		$query = $this->db->get('Categorie');
		// $query = $this->db->query('SELECT * FROM categorie');
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
		
		//return ($query->num_rows() > 0) ? $query->result() : array();
	}
	
	/*
		SELECT COUNT(id_recette) AS nb_recettes
		FROM appartient
		WHERE id_categorie = $id_categorie;
	*/
	
	public function update($id, $nom_categorie, $image_categorie) {
		
	}
	
	public function insert($nom_categorie, $image_categorie) {
		
	}
	
	public function delete($id) {
		
	}
	
}

?>