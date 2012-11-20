<?php

class mRecette extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	protected function get($id) {
		$query = $this->db->get_where('Recette', array('id_recette' => $id));
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function getAll() {
		$query = $this->db->get('Recette');
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	
	
	public function getAllFrom($id_categorie) {
		$requette=<<<EOF
SELECT c.id_categorie, r.id_recette, id_utilisateur, titre, recette, etat, temps_prepar, nb_pers difficult, image_recette, date_recette
FROM categorie c INNER JOIN appartient a ON c.id_categorie = a.id_categorie
				 INNER JOIN recette r ON a.id_recette = r.id_recette
WHERE c.id_categorie=$id_categorie;
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	//getAllFrom($id_categorie)
	
	public function update($id, $nom_recette, $image_recette) {
		
	}
	
	public function insert($nom_recette, $image_recette) {
		
	}
	
	public function delete($id) {
		
	}	
}

?>

