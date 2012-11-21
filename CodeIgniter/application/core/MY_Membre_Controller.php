<?php
class MY_Membre_Controller extends MY_CONTROLLER
{
	function __construct()
	{
		parent::__construct();
		if(!$this->isLogOn())
		{
			$this->load->helper('url');
			redirect('home');
		}
	}
}
?>
