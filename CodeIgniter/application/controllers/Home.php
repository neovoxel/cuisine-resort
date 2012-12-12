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
		else {
			$this->load->helper('url');
			redirect('home');
		}
	}
}
