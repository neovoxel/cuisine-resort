<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_CONTROLLER {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->helper('url');
		$this->load->view('home', null);
	}
	
	function profil($id)
	{
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
	
	public function connexion() {
		$this->load->helper('url');
		$this->load->view('connexion', null);
	}
}
