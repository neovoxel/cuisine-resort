<?php
class MY_Membre_Controller extends MY_Membre_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->isAdmin())
		{
			$this->load->helper('url');
			redirect('home');
		}
	}
}
?>
