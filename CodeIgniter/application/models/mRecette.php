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
	
	public function getAllWithUtilisateur() {
		$requette='SELECT * FROM recette r INNER JOIN utilisateur U ON R.id_utilisateur=U.id_utilisateur';
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getNbPersonne() {
		$requette='SELECT distinct nb_pers FROM recette ';
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getDifficulte() {
		$requette='SELECT distinct difficulte FROM recette ';
		$query = $this->db->query($requette);
		
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
WHERE c.id_categorie=$id_categorie AND etat LIKE 'public'
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getLatest($nb_recette)
	{
		$request = <<< EOF
SELECT *
FROM recette r INNER JOIN utilisateur u ON r.id_utilisateur=u.id_utilisateur
WHERE etat LIKE 'public'
ORDER BY date_recette DESC
LIMIT 0, $nb_recette
EOF;
	$query = $this->db->query($request);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getIngredients($id_recette) {
		$requette = <<< EOF
SELECT *
FROM Compose C INNER JOIN Ingredient I ON C.id_ingredient=I.id_ingredient
INNER JOIN Unite U ON C.id_unite=U.id_unite
WHERE id_recette = $id_recette;
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function getAllFromUtilisateur($id_utilisateur) {
		$requette=<<<EOF
SELECT *
FROM recette r INNER JOIN utilisateur U ON R.id_utilisateur=U.id_utilisateur
WHERE u.id_utilisateur=$id_utilisateur;
EOF;
		$query = $this->db->query($requette);
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return array();
	}
	
	public function update(	$id_recette,
							$id_utilisateur,
							$titre,
							$recette,
							$temps_prepar,
							$nb_pers,
							$difficulte,
							$image_recette,
							$categories,
							$ingredients,
							$unites,
							$quantites) {
		$data = array(
		   'id_utilisateur' => $id_utilisateur,
		   'titre' => $titre,
		   'etat' => 'private',
		   'recette' => $recette,
		   'temps_prepar' => $temps_prepar,
		   'nb_pers' => $nb_pers,
		   'difficulte' => $difficulte
		);
		
		if (!empty($image_recette))
			$data['image_recette'] = $image_recette;
		
		$this->db->where('id_recette', $id_recette);
		$this->db->update('recette', $data);
		
		$this->db->delete('appartient', array('id_recette' => $id_recette));
		foreach ($categories as $line)
			$this->db->insert('appartient', array('id_recette' => $id_recette, 'id_categorie' => $line));
		
		$this->db->delete('compose', array('id_recette' => $id_recette));
		for ($i = 0 ; $i < count($quantites) ; $i++) {
			$data = array(
			   'id_recette' => $id_recette,
			   'id_ingredient' => $ingredients[$i],
			   'id_unite' => $unites[$i],
			   'quantite' => $quantites[$i]
			);
			$this->db->insert('compose', $data);
		}
	}
	
	public function updateEtat($id_recette, $etat) {
		if ($etat == 'public' or $etat == 'waiting' or $etat == 'private') {
			$data = array(
			   'etat' => $etat,
			);
			
			$this->db->where('id_recette', $id_recette);
			$this->db->update('recette', $data);
			return true;
		}
		else
			return false;
	}
	
	public function insert(	$id_utilisateur,
							$titre,
							$recette,
							$temps_prepar,
							$nb_pers,
							$difficulte,
							$image_recette,
							$date_recette,
							$categories,
							$ingredients,
							$unites,
							$quantites) {
		$data = array(
		   'id_utilisateur' => $id_utilisateur,
		   'titre' => $titre,
		   'etat' => 'private',
		   'recette' => $recette,
		   'temps_prepar' => $temps_prepar,
		   'nb_pers' => $nb_pers,
		   'difficulte' => $difficulte,
		   'date_recette' => $date_recette
		);
		
		if (!empty($image_recette))
			$data['image_recette'] = $image_recette;
		
		$this->db->insert('recette', $data);	// Insertion de la recette
		
		$id_recette = $this->db->insert_id();
		
		foreach ($categories as $line)
			$this->db->insert('appartient', array('id_recette' => $id_recette, 'id_categorie' => $line));	// Insertion de la recette dans sa/ses catégorie(s)
		
		for ($i = 0 ; $i < count($quantites) ; $i++) {
			$data = array(
			   'id_recette' => $id_recette,
			   'id_ingredient' => $ingredients[$i],
			   'id_unite' => $unites[$i],
			   'quantite' => $quantites[$i]
			);
			$this->db->insert('compose', $data);	// Insertion des ingredients de la recette
		}
		return $id_recette;
	}
	
	public function delete($id) { 
		$this->db->delete('commentaire', array('id_recette' => $id));
		$this->db->delete('appartient', array('id_recette' => $id));
		$this->db->delete('compose', array('id_recette' => $id));
		$this->db->delete('recette', array('id_recette' => $id));
	}
}

?>

