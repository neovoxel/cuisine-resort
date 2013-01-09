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
		$passwordok = $this->input->post('passwordok');
		$supp = $this->input->post('supp');
		
		$this->load->model('mUtilisateur');
		$error = false;
		
		if (empty($email)) {
			$var['utilisateur']=$this->mUtilisateur->get($id);
			$this->load->view('edit_profil', $var);
			$error = true;
		}
		
		if (!empty($supp))
		{
			$this->mUtilisateur->delete($id);
			$this->deconnexion();
			$this->load->view('home');
			$error = true;
		}
		
		if (!$error) {
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
						if(!$this->mUtilisateur->checkIfEmailExist($email) or $email===$this->mUtilisateur->get($id)->email) //Tout est bon
						{
							$this->mUtilisateur->updateEmail($id, $email);
						}
						else //L'email existe déjà!
						{
							$var['erreur'] = 'Votre adresse email est déjà utilisée! Les doubles comptes sont interdis.';
							$var['utilisateur']=$this->mUtilisateur->get($id);
							$this->load->view('edit_profil', $var);
							$error = true;
						}
					}
				}
				else { //Sinon on affiche page d'édition
					$var['utilisateur']=$this->mUtilisateur->get($id);
					$this->load->view('edit_profil', $var);
					$error = true;
				}
			}
		}
		if (!$error) {
			$this->mUtilisateur->update($id, $nom, $prenom);
			$this->load->model('mRecette');
			$this->load->model('mCommentaire');
			$data['utilisateur'] = $this->mUtilisateur->get($id);
			$data['recettes'] = $this->mRecette->getAllFromUtilisateur($id);
			
			foreach ($data['recettes'] as $line) {
				$line->liste_categories = $this->mRecette->getCategories($line->id_recette);
			}
			
			$data['commentaire'] = $this->mCommentaire->getComsFromUser($id);				
			
			if((strlen($password) >= 6) and ($passwordok == $password))
				$this->mUtilisateur->updatePassword($id, hash('sha256', $password));
			else if (empty($passwordok))
				$error = true;
			else
				$data['erreur']="Le mot de passe n'a pas été changé (Inferieur à 6 caractères).";
				
			$this->load->view('mon_profil', $data);
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
	
	public function editerRecette($id_recette) {
		if (empty($id_recette))
			$this->redirectTo('Membre/ajouterRecette');
		
		$this->load->model('mRecette');
		$data = array();
		$recette = $this->mRecette->get($id_recette);
		
		if ($recette->id_utilisateur == $this->session->userdata('id_utilisateur')) {
			parent::editerRecette($id_recette);
		}
		else
			$this->redirectTo('Membre/ajouterRecette');
	}
	
	public function supprimerRecette() {
		$id_recette = $this->input->post('id_recette');
		$this->load->model('mRecette');
		$recette = $this->mRecette->get($id_recette);
		
		if (!is_null($recette)) {
			if ($recette->id_utilisateur == $this->session->userdata('id_utilisateur'))
				parent::supprimerRecette();
			else
				$this->redirectTo('Membre/profil');
		}
		else
			$this->redirectTo('Membre/profil');
	}
	
	public function changerEtatRecette() {
		$etat = $this->input->post('etat');
		
		if (empty($etat))
			echo 'erreur';
		else if ($etat == 'public')
			echo 'erreur';
		else
			parent::changerEtatRecette();
	}
}
?>
