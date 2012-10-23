<?php

	$jeutest = array('Entrees', 'Plats', 'Dessert');
	
	$PDO_BDD = getPDO_BDD();
	$liste_categorie_request='SELECT * FROM categorie ;';
	
	try { $liste_categorie_result=$PDO_BDD->query($liste_categorie_request); }
	catch (Exception $err)
	{ die ('Erreur : '.$err->getMessage()); }

	$tab_result=$liste_categorie_result->fetchAll(PDO::FETCH_ASSOC);
	
	
	if (isset($_GET['idc']) and !empty($_GET['idc'])) {
		$my_idc = $_GET['idc'];
		
		$liste_recettes_request= <<< EOF
		SELECT id_recette
		FROM appartient
		WHERE id_categorie = $my_idc;
EOF;

		try { $liste_recettes_result=$PDO_BDD->query($liste_recettes_request); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		if ($liste_recettes_result->rowCount() > 0) {
			
			echo '<div id="liste_categories">';
			
			foreach($tab_result as $value) {
				if ($value['id_categorie'] == $my_idc) {
					$id_categorie		= $value['id_categorie'];
					$image_categorie	= $value['image_categorie'];
					$nom_categorie		= $value['nom_categorie'];
					
					echo <<< EOF
<div id="categorie_selection">
<img class="img_categorie" src="./images/categories/$image_categorie" />
<h1>$nom_categorie</h1>
</div>
EOF;

					$liste_recettes_result = $liste_recettes_result->fetchAll(PDO::FETCH_ASSOC);
					
					echo '<div id="liste_recettes">';
					
					foreach ($liste_recettes_result as $line)
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
		
		foreach($tab_result as $value) {
			$id_categorie		= $value['id_categorie'];
			$image_categorie	= $value['image_categorie'];
			$nom_categorie		= $value['nom_categorie'];
			
			echo <<< EOF
<div class="categorie" >
<a href="./index.php?page=recettes&idc=$id_categorie"><img class="img_categorie" src="./images/categories/$image_categorie" /></a>
<h1><a href="./index.php?page=recettes&idc=$id_categorie">$nom_categorie</a></h1>
<p>Mon texte<p>
</div>
EOF;
		}
		
		echo '</div>';
	}
?>
