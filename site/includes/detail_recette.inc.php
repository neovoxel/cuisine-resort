<?php

function previewCommentaire($id_recette) {
	$requette=<<<EOF
	SELECT r.id_recette, titre, commentaire, date_com, u.id_utilisateur, login
	FROM  recette r INNER JOIN commentaire c ON r.id_recette=c.id_recette
					INNER JOIN utilisateur u ON c.id_utilisateur=u.id_utilisateur
	WHERE id_com=$id_recette;
EOF;
	
	$result = my_request($requette);
	
	if ($result !== false) {
		$line = $result[0];
		
		$idUtil='<a href="./index.php?page=profil&idp='.$line['id_utilisateur'].'">'.$line['login'].'</a>';
		$dateCom= formatDateHeure($line['date_com']);
		$textCom=$line['commentaire'];
		
		$commentaire=<<<EOF
		<div class="commentaire">
			<h4>$idUtil le $dateCom</h4>
			<p>$textCom</p>
		</div>
EOF;
		return $commentaire;
	}
	else
		return '';
	
}


if (isset($_GET['idr']) and !empty($_GET['idr']))
{
	$id_recette=$_GET['idr'];
	
	$request_recette = <<< EOF
	SELECT *
	FROM recette
	WHERE id_recette = $id_recette;
EOF;
	$request_utlisateur = <<< EOF
	SELECT U.id_utilisateur, login, nom_utilisateur, prenom
	FROM recette R INNER JOIN utilisateur U ON R.id_utilisateur=U.id_utilisateur
	WHERE id_recette = $id_recette;
EOF;
	$request_ingredients = <<< EOF
	SELECT nom_ingredient, quantite, nom_unite
	FROM recette R INNER JOIN compose C ON R.id_recette=C.id_recette
	INNER JOIN ingredient I ON C.id_ingredient=I.id_ingredient
	INNER JOIN mesure M ON I.id_ingredient=M.id_ingredient
	INNER JOIN unite U ON M.id_unite=U.id_unite
	WHERE R.id_recette = $id_recette;
EOF;
	$request_categorie = <<< EOF
	SELECT C.id_categorie, nom_categorie
	FROM recette R INNER JOIN appartient A ON R.id_recette=A.id_recette
	INNER JOIN categorie C ON A.id_categorie=C.id_categorie
	WHERE R.id_recette = $id_recette;
EOF;
	$request_commentaires = <<< EOF
	SELECT id_com
	FROM commentaire C INNER JOIN recette R ON C.id_recette=R.id_recette
	WHERE R.id_recette = $id_recette;
EOF;
	
	$result_recette		= my_request($request_recette);
	$result_utlisateur	= my_request($request_utlisateur);
	$result_ingredients	= my_request($request_ingredients);
	$result_categorie	= my_request($request_categorie);
	$result_commentaires= my_request($request_commentaires);
	
	if ($result_recette		!== false
	and $result_utlisateur	!== false
	and $result_ingredients	!== false
	and $result_categorie	!== false
	and $result_commentaires!== false) {
		
		$categories_recette = 'Catégorie';
		if (count($result_categorie) > 1)
			$categories_recette .= 's';
		$categories_recette .= ' : ';
		foreach ($result_categorie as $value) {
			$categories_recette .= '<a href="./index.php?page=recettes&idc='.$value['id_categorie'].'">'.$value['nom_categorie'].'</a> ';
		}
		
		$titre_recette		= $result_recette[0]['titre'];
		$nom_utilisateur	= $result_utlisateur[0]['login'];
		$id_utilisateur		= $result_utlisateur[0]['id_utilisateur'];
		$nbr_pers			= $result_recette[0]['nb_pers'];
		$temps_preparation	= formatTime($result_recette[0]['temps_prepar']);
		$difficulte_recette	= getDifficulte($result_recette[0]['difficulte']);
		$texte_recette		= nl2br($result_recette[0]['recette']);
		$date_recette		= formatDate($result_recette[0]['date_recette']);
		
		if (is_null($result_recette[0]['image_recette'])) {
			$image_recette = 'images/default/recette.png';
		}
		else
			$image_recette = 'images/'.$result_utlisateur[0]['login'].'/'.$result_recette[0]['titre'].'/'.$result_recette[0]['image_recette'];
		
		echo <<< EOF
		<div id="detail_recette">
		<div id="presentation">
			<img class="img_recette" src="$image_recette" alt="Illustration recette" height="300" width="300" />
			<h1>$titre_recette</h1>
			<ul>
				<li>$categories_recette</li>
				<li>Préparation : $temps_preparation</li>
				<li>Difficulté : $difficulte_recette</li>
				<li>Nombre de personnes : $nbr_pers</li>
			</ul>
			<p class="auteur_recette">Recette proposée le $date_recette par <a href="./index.php?page=profil&idp=$id_utilisateur">$nom_utilisateur</a></p>
			<hr />
		</div>
		<div id="ingredients">
			<h2>Ingrédients :</h2>
			<ul>
EOF;
		foreach ($result_ingredients as $line)
			echo '<li>'.formatIngredient($line['quantite'], $line['nom_unite'], $line['nom_ingredient']).'</li>';
		echo <<< EOF
			</ul>
		<hr />
		</div>
		<div id="preparation">
			<h2>Préparation : ($temps_preparation)</h2>
			<p>$texte_recette</p>
			<hr />
		</div>
EOF;

		if (!empty($result_commentaires)) {
			echo <<< EOF
			<h2>Commentaires :</h2>
			<div id="liste_commentaires">
EOF;
			
			foreach ($result_commentaires as $line)
				echo previewCommentaire($line['id_com']);
			
			echo '</div>';
		}
		
		echo '</div>';
		
	}
	else
		echo '<h1>Recette inexistante !</h1>';
}
else
	echo '<h1>Recette inexistante !</h1>';

?>