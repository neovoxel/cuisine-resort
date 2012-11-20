<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index() {
		$data = array();
		$this->load->model('mCategorie');
		$data['categories'] = $this->mCategorie->getAll();
		
		$this->load->helper('url');
		$this->load->view('liste_categories', $data);
	}
}
