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
		return $this->_isLogOn() and ($this->session->userdata('type_utilisateur') == 1);
	}
	
	public function _inscription(){
		// On r�cup les infos
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		$passok = $this->input->post('passok');
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		// On v�rifie les donn�es
		if(!empty($login) and !empty($password) and !empty($passok) and !empty($email)) //Pas vide?
		{
			if($password===$passok)
			{
				//CHeck l'adresse mail
				//CHeck la BDD si existe ou non
			}
			else
			{
				$var['erreur'] = 'Les passwords ne sont pas valides entre eux.';
				$var['login'] = $login;
				$var['nom'] = $nom;
				$var['prenom'] = $prenom;
				$var['email'] = $email;
				$this->load->helper('url');
                $this->load->view('inscription', $var);
			}
		}
		else
		{
			$var['erreur'] = 'Les champs obligatoires ne sont pas tous remplis.';
			$this->load->helper('url');
            $this->load->view('inscription', $var);
		}
	}
	
	public function _authentification() {
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
                $this->session->set_userdata('type_utilisateur', $data->type_utilisateur);
                $this->session->set_userdata('login', $login);

                //echo $this->session->userdata('id_utilisateur');
				
				$this->load->helper('url');
				$redirect_page = $this->input->post('redirectTo');
				if (empty($redirect_page))
					redirect('home');
				else
					redirect($redirect_page);
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
           
            // On r�cup�re le mot de passe associ� au pseudo
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
	
	public function getUser() {
		return $this->session;
	}
	
	protected function redirectTo($url) {
		$this->load->helper('url');
		$redirect_page = $url;
		if (empty($redirect_page))
			redirect('home');
		else
			redirect($redirect_page);
	}
}


class MY_Membre_Controller extends MY_CONTROLLER {
	function __construct() {
		parent::__construct();
		if(!$this->_isLogOn()) {
			$this->load->helper('url');
			redirect('home/connexion');
		}
	}
	
	public function ajouterCommentaire() {
		$tmp = $this->input->post('form_com');
		$com = $this->input->post('commentaire');
		$error = false;
		
		if (empty($tmp))
			$error = true;
		else if ($this->input->post('id_recette') == 0)
			$error = true;
		else if (empty($com))
			$error = true;
		
		if (!$error) {
			$this->load->helper('date');
			$this->load->model('mCommentaire');
			$this->mCommentaire->insert($this->session->userdata('id_utilisateur'), $this->input->post('id_recette'), $this->input->post('commentaire'), mdate("%Y-%m-%d %H:%i:%s", time()));
			
			$this->load->helper('url');
			$this->redirectTo($this->input->post('redirectTo'));
			/*if (empty($redirect_page))
				redirect('home');
			else
				redirect($redirect_page);*/
		}
		else {
			$this->load->helper('url');
			redirect('home');
		}
	}
}


class MY_Admin_Controller extends MY_Membre_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->_isAdmin()) {
			$this->load->helper('url');
			redirect('home/connexion');
		}
	}
}

