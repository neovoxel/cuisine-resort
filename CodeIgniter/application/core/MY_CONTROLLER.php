<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller {
	private $user;
	
	function __construct() {
		parent::__construct();
		$user;
	}
	
	/*public function index() {
		$this->load->helper('url');
		redirect('home');
	}*/
	
	public function isLogOn() {
		return $user === true;
	}
	
	public function isAdmin() {
		return isLogOn() and true;
	}
	
	public function connexion() {
		
	}
	
	public function deconnexion() {
		
	}
}
