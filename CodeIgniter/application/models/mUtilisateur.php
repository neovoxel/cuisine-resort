<?php

class mUtilisateur extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($id) {
		$query = $this->db->get_where('Utilisateur', array('id_utilisateur' => $id));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getAll() {
		$query = $this->db->get('Utilisateur');
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	
	public function update($id, $nom_utilisateur, $image_utilisateur) {
		
	}
	
	public function insert($nom_utilisateur, $image_utilisateur) {
		
	}
	
	public function delete($id) {
		
	}	
}

?>

