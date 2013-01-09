<?php

class Membre extends MY_Membre_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->profil();
	}
	
	public function profil() {
		$id = $this->session->userdata('id_utilisateur');
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
		
		$this->load->view('mon_profil', $data);
	}
	
	public function edit() { //EDITION DU PROFIL
		$id = $this->session->userdata('id_utilisateur');
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$email = $this->input->post('email');
		$emailok = $this->input->post('emailok');
		$password = $this->input->post('password');
		$supp = $this->input->post('supp');
		if (!empty($supp))
		{
			$this->load->model('mUtilisateur');
			$this->mUtilisateur->delete($id);
			$this->deconnexion();
			$this->load->view('home');		
		}
		
		if(!empty($email) and !empty($emailok)) { //Si formulaire validé
			// On vérifie les données
			if($email===$emailok)
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
					//CHeck si mail dans BDD
					$this->load->model('mUtilisateur');
					if(!$this->mUtilisateur->checkIfEmailExist($email) or $email===$this->mUtilisateur->get($id)->email) //Tout est bon
					{
						$this->mUtilisateur->update($id, $nom, $prenom, $email, $password);
						$this->load->model('mRecette');
						$this->load->model('mCommentaire');
						$data['utilisateur'] = $this->mUtilisateur->get($id);
						$data['recettes'] = $this->mRecette->getAllFromUtilisateur($id);
						
						foreach ($data['recettes'] as $line) {
							$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
						}
						
						$data['commentaire'] = $this->mCommentaire->getComsFromUser($id);				
						
						if(strlen($password)<6)
							$data['erreur']="Le mot de passe n'a pas été changé (Inferieur à 6 caractères).";
							
						$this->load->view('mon_profil', $data);
					}
					else //L'email existe déjà!
					{
						$var['erreur'] = 'Votre adresse email est déjà utilisée! Les doubles comptes sont interdis.';
						$var['utilisateur']=$this->mUtilisateur->get($id);
						$this->load->view('edit_profil', $var);
					}
				}
			}
		}
		else { //Sinon on affiche page d'édition
			$this->load->model('mUtilisateur');
			$var['utilisateur']=$this->mUtilisateur->get($id);
			$this->load->view('edit_profil', $var);
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
				if ($com->id_utilisateur == $this->session->userdata('id_utilisateur')) {
					$this->mCommentaire->delete($id_com);
					$this->redirectTo($redirectPage);
				}
				else
					$this->redirectTo($redirectPage);
			}
			else
				$this->redirectTo($redirectPage);
		}
	}
	
	public function supprimerRecette() {
		$tmp = $this->input->post('form_supp_recette_x');
		if (empty($tmp))
			$this->redirectTo('home');
		else {
			$id_recette = $this->input->post('id_recette');
			$this->load->model('mRecette');
			$recette = $this->mRecette->get($id_recette);
			
			if (!is_null($recette)) {
				if ($recette->id_utilisateur == $this->session->userdata('id_utilisateur')) {
					if (!empty($recette->image_recette)) {
						$path = './images/'.$this->session->userdata('login').'/'.$recette->id_recette.'/';
						$this->deleteFiles($path);
						rmdir($path);
					}
					
					$this->mRecette->delete($id_recette);
					$this->redirectTo('Membre/profil');
				}
				else
					$this->redirectTo('home');
			}
			else
				$this->redirectTo('home');
			//printf("<pre>%s</pre>", print_r($recette, true));
		}
	}
}
?>
