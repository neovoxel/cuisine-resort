<?php
	include 'lib.inc.php';
	include 'config.inc.php';
	
	$_SQUELETTE['entete'] = loadPageContent('entete.inc.php');
	$_SQUELETTE['navigation'] = loadPageContent('navigation.inc.php');
	$_SQUELETTE['pied'] = loadPageContent('pied.inc.php');
	
	render($_SQUELETTE, 'layout.inc.php');

?>