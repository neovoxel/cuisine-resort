<?php

if (isset($_GET['idp']) and !empty($_GET['idp'])) {
	$id_profil=$_GET['idp'];
	
	$request_profil = <<< EOF
	SELECT *
	FROM utilisateur
	WHERE id_utilisateur = $id_profil;
EOF;
	$request_commentaires = <<< EOF
	SELECT *
	FROM utilisateur U INNER JOIN commentaire C ON U.id_utilisateur=C.id_utilisateur
	WHERE U.id_utilisateur = $id_profil;
EOF;
	$request_recettes = <<< EOF
	SELECT id_recette
	FROM utilisateur U INNER JOIN recette R ON U.id_utilisateur=R.id_utilisateur
	WHERE U.id_utilisateur = $id_profil;
EOF;
	
	
	$PDO_BDD = getPDO_BDD();
	
	try { $result_profil=$PDO_BDD->query($request_profil); }
	catch (Exception $err)
	{ die ('Erreur : '.$err->getMessage()); }
	
	try { $result_commentaires=$PDO_BDD->query($request_commentaires); }
	catch (Exception $err)
	{ die ('Erreur : '.$err->getMessage()); }
	
	try { $result_recettes=$PDO_BDD->query($request_recettes); }
	catch (Exception $err)
	{ die ('Erreur : '.$err->getMessage()); }
	
	if($result_recettes->rowCount() > 0)
			$norecette=false;
		else
			$norecette=true;
			
	if($result_commentaires->rowCount() > 0)
			$nocomment=false;
		else
			$nocomment=true;		
	
	if ($result_profil->rowCount() > 0) {
		
		$result_profil		 = $result_profil->fetchAll(PDO::FETCH_ASSOC);
		$result_commentaires = $result_commentaires->fetchAll(PDO::FETCH_ASSOC);
		$result_recettes	 = $result_recettes->fetchAll(PDO::FETCH_ASSOC);
		
		$login				= $result_profil[0]['login'];
		$nom				= $result_profil[0]['nom_utilisateur'];
		$prenom				= $result_profil[0]['prenom'];
		$email				= $result_profil[0]['email'];
		$type				= $result_profil[0]['type_utilisateur'];
		
		if ($type == 0)
			$type = 'Membre';
		else if ($type == 1)
			$type = 'Administrateur';
		if (is_null($nom))
			$nom = '-';
		if (is_null($prenom))
			$prenom = '-';
		if (is_null($email))
			$email = '-';
		
		echo <<< EOF
		<div id="profil">
		<div id="profil_details">
			<h1>Profil de $login</h1>
			<p>$type<br />
			Nom : $nom<br />
			Prénom : $prenom<br />
			e-mail : $email<br />
			Inscrit le :<br /></p>
			<hr />
		</div>
		<div id="profil_recettes">
			<h2>Recettes de $login</h2>
EOF;
		if(!$norecette)
		{
			echo '<div id="liste_recettes">';
			foreach ($result_recettes as $line)
					echo previewRecette($line['id_recette']);
			echo '</div>';
		}
		else
			echo 'Cet utilisateur n\'a écrit aucune recette.';
					
		echo <<< EOF
			<hr />
		</div>
		<div id="profil_commentaires">
		<h2>Commentaires de $login</h2>
EOF;
		if(!$nocomment)
		{
			echo '<div id="liste_commentaires">';
			foreach ($result_commentaires as $line)
					echo previewCommentaire($line['id_com']);
			echo '</div>';
		}
		else
			echo 'Cet utilisateur n\'a écrit de commentaire.';
					
		echo <<< EOF
		</div>
		</div>
EOF;
		
	}
	else
		echo '<h1>Profil inexistant !</h1>';
}
else if (isset($_SESSION['id_user']))
	echo 'Bonjour, '.$_SESSION['id_user'];
else
	echo '<h1>Profil inexistant !</h1>';

?>
	