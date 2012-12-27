<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller {
	private $user = null;
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
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
		// On récup les infos
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		$passok = $this->input->post('passok');
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		// On vérifie les données
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
                $this->load->view('inscription', $var);
			}
		}
		else
		{
			$var['erreur'] = 'Les champs obligatoires ne sont pas tous remplis.';
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
				
				$redirect_page = $this->input->post('redirectTo');
				if (empty($redirect_page))
					redirect('home');
				else
					redirect($redirect_page);
            }
            else {
                $var['erreur'] = 'Le login et le mot de passe ne correspondent pas.';
				$var['login'] = $login;
                $this->load->view('connexion', $var);
            }
        }
        else {
            //    Le formulaire est invalide ou vide
			$this->redirectTo('home/connexion');
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
        redirect('home/connexion');
	}
	
	public function getUser() {
		return $this->session;
	}
	
	protected function redirectTo($url) {
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
			$this->redirectTo($this->input->post('redirectTo'));
		}
		else
			$this->redirectTo('home');
	}
	
	public function editerRecette($id_recette) {
		if (empty($id_recette))
			$this->redirectTo('Membre/ajouterRecette');
		
		$this->load->model('mRecette');
		$data = $this->mRecette->get($id_recette);
		
		if ($data->id_utilisateur == $this->session->userdata('id_utilisateur')) {
			
			$this->load->view('editer_recette');
		}
		else
			$this->redirectTo('home');
	}
	
	public function ajouterRecette() {
		$titre = $this->input->post('titre');
		
		$this->load->model('mIngredient');
		$this->load->model('mUnite');
		$this->load->model('mCategorie');
		$data = array();
		$data['ingredients'] = $this->mIngredient->getAll();
		$data['unites'] = $this->mUnite->getAll();
		$data['categories'] = $this->mCategorie->getAll();
		
		if (empty($titre)) {
			$this->load->view('editer_recette', $data);
		}
		else {
			$data['recette'] = $this->input->post();
			$erreur = true;
			
			foreach ($data['categories'] as $categorie) {
				$tmp = $this->input->post('categorie_'.$categorie->id_categorie);
				if (!empty($tmp))
					$erreur = false;
			}
			
			if (empty($data['recette']['texte_recette']))
				$erreur = true;
			
			if (empty($data['recette']['quantites']))
				$erreur = true;
			
			if (empty($data['recette']['unites']))
				$erreur = true;
			
			if (empty($data['recette']['ingredients']))
				$erreur = true;
			
			if ($erreur === true) {
				$data['erreur'] = 1;
				$this->load->view('editer_recette', $data);
			}
			else {
				$categories = array();
				$i = 0;
				foreach ($data['categories'] as $categorie) {
					$tmp = $this->input->post('categorie_'.$categorie->id_categorie);
					if (!empty($tmp))
						$categories[$i++] = $tmp;
				}
				
				$data = $data['recette'];
				
				$quantites = explode(';', $data['quantites']);
				$unites = explode(';', $data['unites']);
				$ingredients = explode(';', $data['ingredients']);
				
				$this->load->helper('date');
				$this->load->model('mRecette');
				$this->mRecette->insert($this->session->userdata('id_utilisateur'),
										$data['titre'],
										$data['texte_recette'],
										$data['tps_h'].':'.$data['tps_m'].':'.$data['tps_s'],
										$data['nb_pers'],
										$data['difficulte'],
										mdate("%Y-%m-%d", time()),
										$categories,
										$ingredients,
										$unites,
										$quantites);
				
				$this->redirectTo('Membre/profil');
			}
			
			//printf("<pre>%s</pre>", print_r($data, true));
		}
	}
}


class MY_Admin_Controller extends MY_Membre_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->_isAdmin()) {
			$this->redirectTo('home/connexion');
		}
	}
	
	public function supprimerCommentaire() {
		$tmp = $this->input->post('form_supp_com_x');
		if (empty($tmp))
			$this->redirectTo('home');
		else {
			$id_com = $this->input->post('id_com');
			$redirectPage = $this->input->post('redirectTo');
			$this->load->model('mCommentaire');
			$com = $this->mCommentaire->get($id_com);
			
			if (!is_null($com)) {
				$this->mCommentaire->delete($id_com);
				$this->redirectTo($redirectPage);
			}
			else
				$this->redirectTo($redirectPage);
			
			//printf("<pre>%s</pre>", print_r($com, true));
		}
	}
}

