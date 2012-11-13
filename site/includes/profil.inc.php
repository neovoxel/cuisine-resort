<?php

function liste_commentaires($id_profil) {
	$request_commentaires = <<<EOF
	SELECT date_com, commentaire, R.id_recette, titre
	FROM utilisateur U INNER JOIN commentaire C ON U.id_utilisateur=C.id_utilisateur
	INNER JOIN recette R ON C.id_recette=R.id_recette
	WHERE U.id_utilisateur = $id_profil
	ORDER BY date_com DESC;
EOF;
	
	$result_commentaires= my_request($request_commentaires);
	
	echo '<div id="liste_commentaires">';
	
	if ($result_commentaires !== false) {
		
		foreach ($result_commentaires as $line) {
			$dateCom = formatDateHeure($line['date_com']);
			$textCom = $line['commentaire'];
			$recetteCom = '<a href="index.php?page=detail&idr='.$line['id_recette'].'" >'.$line['titre'].'</a>';
			
			echo <<< EOF
			<div class="commentaire">
				<h4>Le $dateCom sur la recette $recetteCom</h4>
				<p>$textCom</p>
			</div>
EOF;
		}
	}
	else
		echo '<p>Cet utilisateur n\'a écrit aucun commentaire.</p>';
	echo '</div>';
}

if (isset($_GET['idp']) and !empty($_GET['idp'])) {
	$id_profil=$_GET['idp'];
	
	$request_profil = <<< EOF
	SELECT *
	FROM utilisateur
	WHERE id_utilisateur = $id_profil;
EOF;
	$request_recettes = <<< EOF
	SELECT id_recette
	FROM utilisateur U INNER JOIN recette R ON U.id_utilisateur=R.id_utilisateur
	WHERE U.id_utilisateur = $id_profil;
EOF;
	
	$result_profil= my_request($request_profil);
	$result_recettes= my_request($request_recettes);
	
	if ($result_profil !== false) {
		
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
		if($result_recettes !== false) {
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
		
		liste_commentaires($id_profil);
		
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
	