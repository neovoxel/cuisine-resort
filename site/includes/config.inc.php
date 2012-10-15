<?php
	define("HOME_PAGE", 'includes/accueil.inc.php');
	define("ERROR_404", 'includes/error_404.inc.php');
	
	$_PAGES['accueil']		= HOME_PAGE;
	$_PAGES['recettes']		= 'includes/liste_recettes.inc.php';
	$_PAGES['profil']		= 'includes/profil.inc.php';
	$_PAGES['inscription']	= 'includes/inscription.inc.php';
	$_PAGES['detail']		= 'includes/detail_recette.inc.php';
	
?>