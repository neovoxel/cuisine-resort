<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_CONTROLLER {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->helper('url');
		$this->load->model('mUtilisateur');
		$this->load->model('mRecette');
		$data['recettes']=$this->mRecette->getLatest(3);
		
		foreach ($data['recettes'] as $line) {
			$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
		}
		
		$this->load->view('home', $data);
	}
	
	public function rechercher() {
		$data = array();
		$this->load->model('mCategorie');
		$this->load->model('mIngredient');
		$this->load->model('mRecette');
		$data['categorie']=$this->mCategorie->getAll();
		$data['ingredient']=$this->mIngredient->getAll();
		$data['nbPerso']=$this->mRecette->getNbPersonne();
		$data['difficulte']=$this->mRecette->getDifficulte();
		
		$tmp = $this->input->post('form_log');
		if(!empty($tmp))
		{
			$nom_recette=$this->input->post('nomRecette');
			$nom_auteur=$this->input->post('nomAuteur');
			$categorie=$this->input->post('categorie');
			$ingredient=$this->input->post('ingredient');
			$difficult=$this->input->post('difficulte');
			$nbPerso=$this->input->post('nbPerso[]');
			
			$nom_recette=empty($nom_recette)?"%":"%$nom_recette%";
			$nom_auteur=empty($nom_auteur)?"%":"%$nom_auteur%";
			$categorie=($categorie[0]=="NaN" || empty($categorie))?null:$categorie;
			$ingredient=($ingredient[0]=="NaN" || empty($ingredient))?null:$ingredient;
			$difficult=($difficult[0]=="NaN" or empty($difficult))?null:$difficult;
			$nbPerso=($nbPerso[0]==="NaN" || empty($nbPerso))?null:$nbPerso;
			
			$requette='SELECT distinct * FROM recette r INNER JOIN utilisateur u ON u.id_utilisateur=r.id_utilisateur '.
													   'INNER JOIN appartient a ON a.id_recette=r.id_recette '.
													   'INNER JOIN categorie c ON a.id_categorie=c.id_categorie '.
													   'INNER JOIN compose co ON r.id_recette=co.id_recette '.
													   'INNER JOIN ingredient i ON i.id_ingredient=co.id_ingredient '.
													   'WHERE ';
			$requette=$requette.'login LIKE "'.$nom_auteur.'" ';
			$requette=$requette.'AND titre LIKE "'.$nom_recette.'" ';
			for($i=0;$i<count($categorie);$i++)
				$requette=$i>1?"$requette OR c.id_categorie=$categorie[$i] ":"$requette AND c.id_categorie=$categorie[$i] ";
			for($i=0;$i<count($ingredient);$i++)
				$requette=$i>1?"$requette OR i.id_ingredient=$ingredient[$i] ":"$requette AND i.id_ingredient=$ingredient[$i] ";
			for($i=0;$i<count($difficult);$i++)
				$requette=$i>1?"$requette OR difficulte LIKE '$difficult[$i]' ":"$requette AND difficulte LIKE '$difficult[$i]' ";
			for($i=0;$i<count($nbPerso);$i++)
				$requette=$i>1?"$requette OR nb_pers='$nbPerso[$i]' ":"$requette AND nb_pers='$nbPerso[$i]' ";
			$query = $this->db->query($requette);
			
			$requette="$requette GROUP BY id_recette";
			
			if($query->num_rows() > 0)
				$data['result']=$query->result();
			else
				$data['result']=array();
			$data['ok']=true;
		}
		
		$this->load->view('recherche', $data);
		
	}
	
	public function profil($id) {
		$data = array();
		$this->load->model('mUtilisateur');
		$this->load->model('mRecette');
		$this->load->model('mCommentaire');
		$data['utilisateur'] = $this->mUtilisateur->get($id);
		$data['recettes'] = $this->mRecette->getAllFromUtilisateur($id);
		
		foreach ($data['recettes'] as $line) {
			$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
		}
		
		$data['commentaire'] = $this->mCommentaire->getComsFromUser($id);
		
		$this->load->helper('url');
		$this->load->view('profil', $data);
	}
	
	public function inscription(){
		if(!$this->_isLogOn()){
			$tmp = $this->input->post('form_log');
			if (empty($tmp)){
				$this->load->helper('url');
				$this->load->view('inscription');
			}
			else
				$this->_inscription();
		}
		else
			$this->redirectTo('home');
	}
	
	public function connexion() {
		if (!$this->_isLogOn()) {
			$tmp = $this->input->post('form_log');
			if (empty($tmp)) {
				$this->load->helper('url');
				$this->load->view('connexion');
			}
			else
				$this->_authentification();
		}
		else
			$this->redirectTo('home');
	}
}
