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
	
	public function checkIfLoginExist($login)
	{
		$query=$this->db->get_where('utilisateur', array('login' => $login));
		return $query->num_rows()==0?false:true; //Si query est vide (aucun pseudo identique) alors renvoie null
	}
	
	public function checkIfEmailExist($email)
	{
		$query=$this->db->get_where('utilisateur', array('email' => $email));
		return $query->num_rows()==0?false:true; //Si query est vide (aucun email identique) alors renvoie null
	}
	
	public function getPassword($login) {
		//echo "<h1>$login</h1>";
		
		$query = $this->db->query("SELECT * FROM Utilisateur WHERE login = '".$login."'");
		
		if($query->num_rows() > 0) {
			$categorie = $query->result();
			return $categorie[0];
		}
		else
			return null;
	}
	
	public function update($id, $nom_utilisateur, $image_utilisateur) {
		
	}
	
	public function insert($login, $password, $nom_utilisateur, $prenom, $email) {
		$data = array(
		   'login' => $login,
		   'mdp' => $password,
		   'nom_utilisateur' => $nom_utilisateur,
		   'prenom' => $prenom,
		   'email' => $email,
		   'type_utilisateur' => 0
		);
		$this->db->insert('utilisateur', $data);
	}
	
	public function delete($id) {
		
	}	
}

?>

