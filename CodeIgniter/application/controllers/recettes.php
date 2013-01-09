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
		
		foreach ($data['categories'] as $line)
			$line->nb_recettes = $this->mCategorie->getNbRecettes($line->id_categorie)->nb_recettes;
		
		$this->load->view('liste_categories', $data);
	}
	
	public function liste_recettes($id_categorie) {
		$data = array();
		$this->load->model('mCategorie');
		$data['categorie'] = $this->mCategorie->get($id_categorie);
		
		if (!is_null($data['categorie'])) {
			$this->load->model('mRecette');
			$data['recettes'] = $this->mRecette->getAllFrom($id_categorie);
			
			foreach ($data['recettes'] as $line)
				$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
			
			$this->load->view('liste_recettes', $data);
		}
		else
			$this->redirectTo('Recettes/liste_categories');
	}
	
	public function detail_recette($id_recette) {
		$data = array();
		$this->load->model('mRecette');
		$this->load->model('mUtilisateur');
		$this->load->model('mCommentaire');
		$data['recette'] = $this->mRecette->get($id_recette);
		$data['recette']->liste_categories = $this->mRecette->getCategories($id_recette);
		$data['utilisateur'] = $this->mUtilisateur->get($data['recette']->id_utilisateur);
		$data['ingredients'] = $this->mRecette->getIngredients($id_recette);
		$data['commentaires'] = $this->mCommentaire->getComsFromRecette($id_recette);
			
		//printf("<pre>%s</pre>", print_r($data, true));
		
		$this->load->view('detail_recette', $data);
		
	}
}

