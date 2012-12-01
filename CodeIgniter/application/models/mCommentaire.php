<?php

class mCommentaire extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($id) {
		$query = $this->db->get_where('Commentaire', array('id_commentaire' => $id));
		
		if($query->num_rows() > 0) {
			$com = $query->result();
			return $com[0];
		}
		else
			return null;
	}
	
	public function getAll() {
		$query = $this->db->get('Commentaire');
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getAllFromRecette($id_recette) {
		$query = $this->db->query('SELECT id_com
	FROM commentaire C INNER JOIN recette R ON C.id_recette=R.id_recette
	WHERE R.id_recette = $id_recette;');
		
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else
			return null;
	}
	
	public function getAllFromUtilisateur($id_utilisateur) {
		$query = $this->db->query('SELECT id_com
FROM commentaire C INNER JOIN utilisateur U ON C.id_recette=U.id_utilisateur
WHERE U.id_utilisateur = $id_utilisateur;');
		
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else
			return null;
	}
	
	public function update($id, $nom_ingredient, $image_ingredient) {
		
	}
	
	public function insert($nom_ingredient, $image_ingredient) {
		
	}
	
	public function delete($id) {
		
	}	
}

?>
