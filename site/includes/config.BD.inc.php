<?php

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_DATABASE', 'cuisine');
define('DB_USERNAME', 'cuisine_user');
define('DB_PASSWORD', 'SJzEeqLb2HHeNYVV');

try {
	$PDO_BDD = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
	$PDO_BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$PDO_BDD->exec("SET NAMES 'utf8'");
}
catch (Exception $err) {
	echo 'Erreur : '.$err->getMessage().'<br/>';
	echo 'N° : '.$err->getCode();
	exit();
}

?>