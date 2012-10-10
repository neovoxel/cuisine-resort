<?php
	include 'includes/config.inc.php';
	include 'includes/lib.inc.php';
	
	
	if (isset($_GET['page']) and !empty($_GET['page']))
	{
		if (pageExists($_GET['page'], $_PAGES))
			$page = $_PAGES[$_GET['page']];
		else
			$page = ERROR_404;
	}
	else
		$page = $_PAGES['accueil'];
	
	$_SQUELETTE['entete']		= loadPageContent('includes/entete.inc.php');
	$_SQUELETTE['navigation']	= loadPageContent('includes/navigation.inc.php');
	$_SQUELETTE['contenu']		= loadPageContent($page);
	$_SQUELETTE['pied']			= loadPageContent('includes/pied.inc.php');
	
	render($_SQUELETTE, 'includes/layout.inc.php');

?>