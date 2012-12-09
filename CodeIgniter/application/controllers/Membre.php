<?php

class Membre extends MY_Membre_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->profil();
	}
	
	public function profil($id) {
		$data = array();
		$this->load->model('mUtilisateur');
		$data['utilisateur'] = $this->mUtilisateur->get($id);
		$this->load->helper('url');
		$this->load->view('profil', $data);
	}
}
?>
