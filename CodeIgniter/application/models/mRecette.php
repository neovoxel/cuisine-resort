<?php

class mRecette extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($id) {
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
	
	public function getCategories($id_recette) {
		$requette=<<<EOF
SELECT C.id_categorie, nom_categorie
FROM recette R INNER JOIN appartient A ON R.id_recette=A.id_recette
INNER JOIN categorie C ON A.id_categorie=C.id_categorie
WHERE R.id_recette = $id_recette;
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getAllFrom($id_categorie) {
		$requette=<<<EOF
SELECT c.id_categorie, r.id_recette, U.id_utilisateur, titre, recette, etat, temps_prepar, nb_pers difficult, image_recette, date_recette, login
FROM categorie c INNER JOIN appartient a ON c.id_categorie = a.id_categorie
INNER JOIN recette r ON a.id_recette = r.id_recette
INNER JOIN utilisateur U ON R.id_utilisateur=U.id_utilisateur
WHERE c.id_categorie=$id_categorie;
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getIngredients($id_recette) {
		$requette = <<< EOF
SELECT nom_ingredient, quantite, nom_unite
FROM recette R INNER JOIN compose C ON R.id_recette=C.id_recette
INNER JOIN ingredient I ON C.id_ingredient=I.id_ingredient
INNER JOIN mesure M ON I.id_ingredient=M.id_ingredient
INNER JOIN unite U ON M.id_unite=U.id_unite
WHERE R.id_recette = $id_recette;
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function update($id, $nom_recette, $image_recette) {
		
	}
	
	public function insert($nom_recette, $image_recette) {
		
	}
	
	public function delete($id) {
		
	}	
}

?>

