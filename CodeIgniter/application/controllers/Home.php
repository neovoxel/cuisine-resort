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
		$data['utilisateur'] = $this->mUtilisateur->get($id);
		$data['recettes'] = $this->mRecette->getAllFromUtilisateur($id);
		
		foreach ($data['recettes'] as $line) {
			$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
		}
		
		$this->load->helper('url');
		$this->load->view('profil', $data);
	}
}
