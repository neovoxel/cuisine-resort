<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->liste_categories();
	}
	
	public function liste_categories() {
		$data = array();
		$this->load->model('mCategorie');
		$data['categories'] = $this->mCategorie->getAll();
		
		$this->load->helper('url');
		//$this->load->view('header');
		$this->load->view('liste_categories', $data);
		//$this->load->view('footer');
	}
	
	public function liste_recettes($id_categorie) {
		
	}
	
	public function detail_recette($id_recette) {
		
	}
	
	public function connexion() {
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */