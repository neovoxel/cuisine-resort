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
