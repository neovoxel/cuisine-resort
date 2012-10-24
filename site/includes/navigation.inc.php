<a href="./index.php?page=accueil">Accueil</a>
<a href="./index.php?page=recettes">Les recettes</a>
<a href="./index.php?page=recherche">Rechercher</a>
<a href="./index.php?page=profil">Votre profil</a>
<?php
if (isset($_SESSION['id_user']))
	echo '<a href="./index.php?page=deconnexion">Déconnexion</a>';
else
	echo '<a href="./index.php?page=connexion">Connexion</a>';
?>
