<?php

class Membre extends MY_Membre_Controller
{
	function index()
	{
		$this->profil();
	}
	
	function profil($id)
	{
		$data = array();
		$this->load->model('mUtilisateur');
		$data['utilisateur'] = $this->mUtilisateur->get($id);
		$this->load->helper('url');
		$this->load->view('liste_categories', $data);
	}
}
?>
