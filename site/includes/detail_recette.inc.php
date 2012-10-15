<?php
	if (isset($_GET['idr']) and !empty($_GET['idr']))
	{
		//echo 'trololo '.$_GET['idr'];
		global $PDO_BDD;
		
		$detail_recette_request='SELECT * FROM recette WHERE id_recette = '.$_GET['idr'];
		
		try { $detail_recette_result=$PDO_BDD->query($detail_recette_request); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }

		$tab_result=$detail_recette_result->fetchAll(PDO::FETCH_ASSOC);
		
		/*
		SELECT I.id_ingredient, id_unite, nom_ingredient
		FROM recette R INNER JOIN compose C ON R.id_recette=C.id_recette
		INNER JOIN ingredient I ON C.id_ingredient=I.id_ingredient
		WHERE R.id_recette = 1
		*/
		
		

		foreach($tab_result as $line) {
			echo '<div id="presentation">';
			echo '<h1>'.$line['titre'].'</h1><ul>';
			echo '<li>Préparation : '.$line['temps_prepar'].'</li>';
			echo '<li>Difficulté : '.$line['difficulte'].'</li>';
			echo '<li>Nombre de personnes : '.$line['nb_pers'].'</li>';
			echo '</ul></div>';
			
			echo '<div id="ingredients">';
			echo '<h2>Ingérdients :</h2>';
			
			echo '</div>';
			
			echo '<div id="preparation">';
			echo '<h2>Préparation :</h2>';
			echo '<p>'.nl2br($line['recette']).'</p>';
			echo '</div>';
		}

		
	}
	else
		echo '<h1>Recette inexistante !</h1>';

?>