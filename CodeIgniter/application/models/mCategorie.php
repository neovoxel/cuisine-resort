<?php

class mCategorie extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($id) {
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
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getNbRecettes($id_categorie) {
		$requette=<<<EOF
SELECT COUNT(A.id_recette) as "nb_recettes"
FROM appartient A INNER JOIN recette R ON A.id_recette=R.id_recette
WHERE id_categorie = $id_categorie AND etat LIKE 'public'
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function update($id, $nom_categorie, $image_categorie) {
		
	}
	
	public function insert($nom_categorie, $image_categorie) {
		
	}
	
	public function delete($id) {
		
	}
	
}

?>