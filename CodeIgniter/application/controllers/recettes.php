<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recettes extends MY_CONTROLLER {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->liste_categories();
	}
	
	public function liste_categories() {
		$data = array();
		$this->load->model('mCategorie');
		$data['categories'] = $this->mCategorie->getAll();
		
		$this->load->helper('url');
		$this->load->view('liste_categories', $data);
	}
	
	public function liste_recettes($id_categorie) {
		$data = array();
		$this->load->model('mRecette');
		$this->load->model('mCategorie');
		$data['recettes'] = $this->mRecette->getAllFrom($id_categorie);
		$data['categorie'] = $this->mCategorie->get($id_categorie);
		
		
		foreach ($data['recettes'] as $line) {
			//echo $line->id_recette;
			//$data['recettes']['utilisateur'] = $this->mCategorie->get($id_categorie);
			$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
		}
		
		//printf("<pre>%s</pre>", print_r($data, true));
		
		$this->load->helper('url');
		$this->load->view('liste_recettes', $data);
	}
	
	public function detail_recette($id_recette) {
		$data = array();
		$this->load->model('mRecette');
		$data['recette'] = $this->mRecette->get($id_recette);
		
		$this->load->helper('url');
		$this->load->view('detail_recette', $data);
	}
}

