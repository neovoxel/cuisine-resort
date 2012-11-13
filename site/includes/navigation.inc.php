<a href="./index.php?page=accueil">Accueil</a>
<a href="./index.php?page=recettes">Les recettes</a>
<a href="./index.php?page=recherche">Rechercher</a>
<?php
if (isset($_SESSION['id_utilisateur'])) {
	echo '<a href="./index.php?page=profil">Mon profil</a>'."\n";
	echo '<a href="./index.php?page=deconnexion">Déconnexion</a>';
}
else
	echo '<a href="./index.php?page=connexion">Connexion</a>';
?>
