<?php
	if (isset($_GET['idr']) and !empty($_GET['idr']))
	{
		$id_recette=$_GET['idr'];
		
		$request_recette = <<< EOF
		SELECT *
		FROM recette
		WHERE id_recette = $id_recette;
EOF;
		$request_utlisateur = <<< EOF
		SELECT login, nom_utilisateur, prenom
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
		
		$PDO_BDD = getPDO_BDD();
		
		try { $result_recette=$PDO_BDD->query($request_recette); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		try { $result_utlisateur=$PDO_BDD->query($request_utlisateur); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		try { $result_ingredients=$PDO_BDD->query($request_ingredients); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		if ($result_recette->rowCount() > 0
		and $result_utlisateur->rowCount() > 0
		and $result_ingredients->rowCount() > 0) {
			
			$result_recette		= $result_recette->fetchAll(PDO::FETCH_ASSOC);
			$result_utlisateur	= $result_utlisateur->fetchAll(PDO::FETCH_ASSOC);
			$result_ingredients	= $result_ingredients->fetchAll(PDO::FETCH_ASSOC);
			
			$titre_recette		= $result_recette[0]['titre'];
			$nom_utilisateur	= $result_utlisateur[0]['login'];
			$nbr_pers			= $result_recette[0]['nb_pers'];
			$temps_preparation	= formatTime($result_recette[0]['temps_prepar']);
			$difficulte_recette	= getDifficulte($result_recette[0]['difficulte']);
			$text_recette		= nl2br($result_recette[0]['recette']);
			$date_recette		= formatDate($result_recette[0]['date_recette']);
			
			if (is_null($result_recette[0]['image_recette'])) {
				$image_recette = 'images/default/recette.png';
			}
			else
				$image_recette = 'images/'.$result_utlisateur[0]['login'].'/'.$result_recette[0]['titre'].'/'.$result_recette[0]['image_recette'];
			
			echo <<< EOF
			<div id="detail_recette">
			<div id="presentation">
				<img class="img_recette" src="$image_recette" alt="Illustration recette" />
				<h1>$titre_recette</h1>
				<ul>
					<li>Préparation : $temps_preparation</li>
					<li>Difficulté : $difficulte_recette</li>
					<li>Nombre de personnes : $nbr_pers</li>
				</ul>
				<p class="auteur_recette">Recette proposée le $date_recette par <a href="./index.php?page=profil&idp=2">$nom_utilisateur</a></p>
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
				<p>$text_recette</p>
			</div>
			</div>
EOF;
			
		}
		else
			echo '<h1>Recette inexistante !</h1>';
	}
	else
		echo '<h1>Recette inexistante !</h1>';

?>