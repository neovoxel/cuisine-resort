<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller {
	private $user = null;
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$user;
	}
	
	/*public function index() {
		$this->load->helper('url');
		redirect('home');
	}*/
	
	public function _isLogOn() {
		$tmp = $this->session->userdata('login');
		return !empty($tmp);
	}
	
	public function _isAdmin() {
		return isLogOn() and true;
	}
	
	public function authentification() {
		//$this->load->library('session');
		
		//$this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[4]|max_length[30]|alpha_dash|encode_php_tags|xss_clean');
        //$this->form_validation->set_rules('pass',    '"Mot de passe"',       'trim|required|min_length[4]|max_length[30]|alpha_dash|encode_php_tags|xss_clean');
		
		$login = $this->input->post('login');
		$pwd = $this->input->post('pwd');
		
        if(!empty($login) and !empty($pwd))
        {
            $this->load->model('mUtilisateur');
            $data = $this->mUtilisateur->getPassword($login);
			
			$error = is_null($data);
			if (!$error)
				$error = ($data->mdp != $pwd);
			if (!$error) {
                $this->session->set_userdata('id_utilisateur', $data->id_utilisateur);
                $this->session->set_userdata('login', $login);

                //echo $this->session->userdata('id_utilisateur');
				
				$this->load->helper('url');
				redirect('home');
            }
            else {
                $var['erreur'] = 'Le login et le mot de passe ne correspondent pas.';
				$var['login'] = $login;
				$this->load->helper('url');
                $this->load->view('connexion', $var);
            }
        }
        else {
            //    Le formulaire est invalide ou vide
			$this->load->helper('url');
            $this->load->view('connexion');
        }
		
		/*if($this->form_validation->run())
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
		$this->session->sess_destroy();
		$this->load->helper('url');
        redirect('home/connexion');
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


