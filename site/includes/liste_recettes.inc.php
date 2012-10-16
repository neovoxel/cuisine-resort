<?php

	$jeutest = array('Entrees', 'Plats', 'Dessert');
	global $PDO_BDD;

	if (isset($_GET['idc']) and !empty($_GET['idc']))
	{
		/*
		 * A faire: Finir la liste des recettes (voir requette)
		 * */
		
		echo "NOPE.avi"; //A modifier avec liste recette de la categorie
		$liste_recette_request='SELECT * FROM categorie ;';
		
		try { $liste_categorie_result=$PDO_BDD->query($liste_recette_request); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }

		$tab_result=$liste_categorie_result->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($tab_result as $value)
			echo '<a href="./index.php?page=recettes&idc='.$value['id_categorie'].'"><div id="'.$value['id_categorie'].'">
					<div id="img-'.$value['id_categorie'].'"><img src="./images/categories/'.$value['image_categorie'].'"/></div>
					<div id="txt-'.$value['id_categorie'].'">'.$value['nom_categorie'].' : Mon texte</div>
				  </div></a>'; //A modifier avec les catégories
	}
	
	else
	{
		$liste_recette_request='SELECT * FROM categorie;';
		
		try { $liste_categorie_result=$PDO_BDD->query($liste_recette_request); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }

		$tab_result=$liste_categorie_result->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($tab_result as $value)
			echo '<a href="./index.php?page=recettes&idc='.$value['id_categorie'].'"><div id="'.$value['id_categorie'].'">
					<div id="img-'.$value['id_categorie'].'"><img src="./images/categories/'.$value['image_categorie'].'"/></div>
					<div id="txt-'.$value['id_categorie'].'">'.$value['nom_categorie'].' : Mon texte</div>
				  </div></a>'; //A modifier avec les catégories
	}
?>
