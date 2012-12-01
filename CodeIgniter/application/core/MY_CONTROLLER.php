<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller {
	private $user;
	
	function __construct() {
		parent::__construct();
		//$this->load->library('session');
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
		//$this->load->library('session');
		
		/*$this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[4]|max_length[30]|alpha_dash|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('pass',    '"Mot de passe"',       'trim|required|min_length[4]|max_length[30]|alpha_dash|encode_php_tags|xss_clean');

        if($this->form_validation->run())
        {
            $this->load->model('members_model', 'Members');
           
            // On récupère le mot de passe associé au pseudo
            $data = $this->Members->get_pass($this->input->post('pseudo'));

            if ($data->password == hash('sha256', $this->input->post('pass'))) {
                $this->session->set_userdata('member-id', $data->id);
                $this->session->set_userdata('pseudo', $this->input->post('pseudo'));

                echo $this->session->userdata('member-id');

                $this->load->view('connexion-reussie');
            }
            else {
                $var['erreur'] = 'Le pseudo et le mot de passe ne correspondent pas.';
                $this->load->view('connexion', $var);
            }
           
        }
        else
        {
            //    Le formulaire est invalide ou vide
            $this->load->view('connexion');
        }*/
	}
	
	public function deconnexion() {
		
	}
}


class MY_Membre_Controller extends MY_CONTROLLER
{
	function __construct() {
		parent::__construct();
		if(!$this->isLogOn())
		{
			$this->load->helper('url');
			redirect('home');
		}
	}
}


class MY_Admin_Controller extends MY_Membre_Controller
{
	function __construct() {
		parent::__construct();
		if(!$this->isAdmin())
		{
			$this->load->helper('url');
			redirect('home');
		}
	}
}


