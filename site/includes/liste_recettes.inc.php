<?php

$result_categories = my_request('SELECT * FROM categorie;');

if ($result_categories !== false) {

	if (isset($_GET['idc']) and !empty($_GET['idc'])) {
		$my_idc = $_GET['idc'];
		
		$request_recettes = <<< EOF
		SELECT id_recette
		FROM appartient
		WHERE id_categorie = $my_idc;
EOF;
		$result_recettes = my_request($request_recettes);
		
		if ($result_recettes !== false) {
			
			echo '<div id="liste_categories">';
			
			foreach($result_categories as $line) {
				if ($line['id_categorie'] == $my_idc) {
					$id_categorie	 = $line['id_categorie'];
					$image_categorie = $line['image_categorie'];
					$nom_categorie	 = $line['nom_categorie'];
					
					echo <<< EOF
	<div id="categorie_selection">
	<img class="img_categorie" src="./images/categories/$image_categorie" />
	<h1>$nom_categorie</h1>
	</div>
EOF;
					echo '<div id="liste_recettes">';
					foreach ($result_recettes as $line)
						echo previewRecette($line['id_recette']);
					echo '</div>';
				}
			}
			echo '</div>';
		}
		else
			echo 'Cette catégorie est vide ou n\'existe pas.';
	}
	else {
		echo '<div id="liste_categories">';
		
		foreach($result_categories as $line) {
			$id_categorie	 = $line['id_categorie'];
			$image_categorie = $line['image_categorie'];
			$nom_categorie	 = $line['nom_categorie'];
			$nb_recettes	 = 0;
			$lien_recette	 = '<a href="index.php?page=recettes&idc='.$id_categorie.'" >Voir les recettes</a>';
			$ajouter_recette = '<a href="index.php?page=ajouter_recette&idc='.$id_categorie.'" >Ajouter une recette</a>';
			
			$request_recettes = <<< EOF
			SELECT COUNT(id_recette) AS nb_recettes
			FROM appartient
			WHERE id_categorie = $id_categorie;
EOF;
			$result_recettes = my_request($request_recettes);
			
			if ($result_recettes !== false) {
				$nb_recettes = $result_recettes[0]['nb_recettes'];
			}
			
			echo <<< EOF
	<div class="categorie" >
		<a href="./index.php?page=recettes&idc=$id_categorie"><img class="img_categorie" src="./images/categories/$image_categorie" /></a>
		<h1><a href="./index.php?page=recettes&idc=$id_categorie">$nom_categorie</a></h1>
		<p>Il y a actuellement $nb_recettes recettes dans cette catégorie.<br />
		$lien_recette<br />
		$ajouter_recette<p>
	</div>
EOF;
		}
		
		echo '</div>';
	}
}
else
	echo 'Y a un soucis';
?>
