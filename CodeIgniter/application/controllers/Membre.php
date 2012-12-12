<?php

class Membre extends MY_Membre_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->profil();
	}
	
	public function profil($id) {
		$data = array();
		$this->load->model('mUtilisateur');
		$data['utilisateur'] = $this->mUtilisateur->get($id);
		$this->load->helper('url');
		$this->load->view('profil', $data);
	}
	
	public function supprimerCommentaire() {
		$tmp = $this->input->post('form_supp_com');
		if (empty($tmp)) {
			$this->load->helper('url');
			redirect('home');
		}
		else {
			$id_com = $this->input->post('id_com');
			$this->load->model('mCommentaire');
			$com = $this->mCommentaire->get($id_com);
			
			if (!is_null($com)) {
				if ($com->id_utilisateur == $this->session->userdata('id_utilisateur')) {
					$this->mCommentaire->delete($id_com);
					$this->load->helper('url');
					redirect('home');
				}
				else
					echo 'NO';
			}
			else
				echo 'NO';
			//printf("<pre>%s</pre>", print_r($com, true));
		}
	}
}
?>
