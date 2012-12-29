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
		$emailok = $this->input->post('emailok');
		// On vérifie les données
		if(!empty($login) and !empty($password) and !empty($passok) and !empty($email) and !empty($emailok)) //Pas vide?
		{
			if($password===$passok and $email===$emailok)
			{
				//CHeck l'adresse mail
				$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
				$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
											   
				$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
				'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
												// séparés par des caractères autorisés avant l'arobase
				'@' .                           // Suivis d'un arobase
				'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
												// séparés par des points
				$domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine
				
				if(preg_match($regex,$email))
				{
					//CHeck si mail ou pseudo existe dans BDD
					$this->load->model('mUtilisateur');
					if(!$this->mUtilisateur->checkIfLoginExist($login) and !$this->mUtilisateur->checkIfEmailExist($email)) //Tout est bon
					{
						$this->mUtilisateur->insert($login, $password, $nom, $prenom, $email);
						mkdir("./images/$login");
						$headers = 'From: webmaster@cuisine-resort.com' . "\r\n" .
								   'X-Mailer: PHP/' . phpversion();
						mail($email,"Bienvenue sur Cuisine-resort!", "Toute l'équipe de Cuisine-resort vous souhaite la bienvenue!",$headers);
						$var['ok'] = true;
						$var['login'] = $login;
						$this->load->view('inscription', $var);
					}
					else if($this->mUtilisateur->checkIfLoginExist($login)) //Le pseudo est déjà pris!
					{
						$var['erreur'] = 'Ce pseudonyme est déjà pris! Veuillez en choisir un autre.';
						$var['login'] = $login;
						$var['nom'] = $nom;
						$var['prenom'] = $prenom;
						$var['email'] = $email;
						$var['ok'] = false;
						$this->load->view('inscription', $var);
					}
					else if($this->mUtilisateur->checkIfEmailExist($email)) //L'email existe déjà!
					{
						$var['erreur'] = 'Votre adresse email est déjà utilisée! Les doubles comptes sont interdis.';
						$var['login'] = $login;
						$var['nom'] = $nom;
						$var['prenom'] = $prenom;
						$var['ok'] = false;
						$this->load->view('inscription', $var);
					}
				}
				else // L'adresse mail n'est pas bonne
				{
					$var['erreur'] = 'Votre adresse email est invalide!';
					$var['login'] = $login;
					$var['nom'] = $nom;
					$var['prenom'] = $prenom;
					$var['ok'] = false;
					$this->load->view('inscription', $var);
				}
			}
			else if($password!==$passok) //Mot de passe fail
			{
				$var['erreur'] = 'Les passwords ne correspondent pas.';
				$var['login'] = $login;
				$var['nom'] = $nom;
				$var['prenom'] = $prenom;
				$var['email'] = $email;
				$var['ok'] = false;
                $this->load->view('inscription', $var);
			}
			else if($email!==$emailok) //Mail fail
			{
				$var['erreur'] = 'Les emails ne correspondent pas.';
				$var['login'] = $login;
				$var['nom'] = $nom;
				$var['prenom'] = $prenom;
				$var['email'] = $email;
				$var['ok'] = false;
                $this->load->view('inscription', $var);
			}
		}
		else
		{
			$var['erreur'] = 'Les champs obligatoires ne sont pas tous remplis.';
			$var['ok'] = false;
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
		$data = array();
		$recette = $this->mRecette->get($id_recette);
		
		if ($recette->id_utilisateur == $this->session->userdata('id_utilisateur')) {
			$titre = $this->input->post('titre');
			if (empty($titre)) {
				$this->load->model('mIngredient');
				$this->load->model('mUnite');
				$this->load->model('mCategorie');
				
				$data['ingredients'] = $this->mIngredient->getAll();
				$data['unites'] = $this->mUnite->getAll();
				$data['categories'] = $this->mCategorie->getAll();
				
				$tabRecette['id_recette'] = $id_recette;
				
				$categories_recette = $this->mRecette->getCategories($id_recette);
				foreach ($categories_recette as $categorie)
					$tabRecette['categorie_'.$categorie->id_categorie] = $categorie->nom_categorie;
				
				$tabRecette['titre'] = $recette->titre;
				$tabRecette['texte_recette'] = $recette->recette;
				$tabRecette['nb_pers'] = $recette->nb_pers;
				$tabRecette['difficulte'] = $recette->difficulte;
				
				$temps_prepar = explode(':', $recette->temps_prepar);
				$tabRecette['tps_h'] = $temps_prepar[0];
				$tabRecette['tps_m'] = $temps_prepar[1];
				$tabRecette['tps_s'] = $temps_prepar[2];
				
				$ingredients_recette = $this->mRecette->getIngredients($id_recette);
				$tabRecette['quantites'] = $ingredients_recette[0]->quantite;
				$tabRecette['unites'] = $ingredients_recette[0]->id_unite;
				$tabRecette['ingredients'] = $ingredients_recette[0]->id_ingredient;
				$tabRecette['uniqueIDs'] = $ingredients_recette[0]->quantite.'_'.$ingredients_recette[0]->id_unite.'_'.$ingredients_recette[0]->id_ingredient.'_'.rand(0, 100000);
				
				for ($i = 1 ; $i < count($ingredients_recette) ; $i++) {
					$tabRecette['quantites'] .= ';'.$ingredients_recette[$i]->quantite;
					$tabRecette['unites'] .= ';'.$ingredients_recette[$i]->id_unite;
					$tabRecette['ingredients'] .= ';'.$ingredients_recette[$i]->id_ingredient;
					$tabRecette['uniqueIDs'] .= ';'.$ingredients_recette[$i]->quantite.'_'.$ingredients_recette[$i]->id_unite.'_'.$ingredients_recette[$i]->id_ingredient.'_'.rand(0, 100000);
				}
				
				$data['recette'] = $tabRecette;
				$this->load->view('editer_recette', $data);
			}
			else {
				echo 'update !';
			}
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

