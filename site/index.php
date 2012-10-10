<?php
	include 'includes/lib.inc.php';
	include 'includes/config.inc.php';
	
	$_SQUELETTE['entete']		= loadPageContent('includes/entete.inc.php');
	$_SQUELETTE['navigation']	= loadPageContent('includes/navigation.inc.php');
	$_SQUELETTE['contenu']		= loadPageContent(HOME_PAGE);
	$_SQUELETTE['pied']			= loadPageContent('includes/pied.inc.php');
	
	render($_SQUELETTE, 'includes/layout.inc.php');

?>