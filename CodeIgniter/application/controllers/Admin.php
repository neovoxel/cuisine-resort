<?php

class Admin extends MY_Admin_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view('administration');
		//$this->administrationRecettes();
	}
	
	public function administrationRecettes() {
		$this->load->model('mUtilisateur');
		$this->load->model('mRecette');
		$data['recettes'] = $this->mRecette->getAllWithUtilisateur();
		
		foreach ($data['recettes'] as $line) {
			$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
		}
		
		$this->load->view('administrationRecettes', $data);
	}
	
	public function administrationMembres() {
		
	}
}
?>
