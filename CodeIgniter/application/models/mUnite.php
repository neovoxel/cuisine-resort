<?php

class mUnite extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	protected function get($id) {
		$query = $this->db->get_where('Unite', array('id_unite' => $id));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getByName($nom_unite) {
		$query = $this->db->get_where('Unite', array('nom_unite' => $nom_unite));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getAll() {
		$query = $this->db->get('Unite');
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	
	public function update($id, $nom_unite, $image_unite) {
		
	}
	
	public function insert($nom_unite) {
		$data = array(
		   'nom_unite' => $nom_unite
		);
		
		$this->db->insert('Unite', $data);	// Insertion de la recette
		return $this->db->insert_id();
	}
	
	public function delete($id) {
		
	}	
}

?>
