<!DOCTYPE html>
<html>
<head>
	<title>Liste des catégories</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>

	<div id="contenu">
	<div id="liste_categories">
		<?php foreach($categories as $line) :
		$id_categorie	 = $line->id_categorie;
		$image_categorie = $line->image_categorie;
		$nom_categorie	 = $line->nom_categorie;
		$nb_recettes	 = 0;
?>

		<div class="categorie" >
		<a href="./index.php?page=recettes&idc=<?php echo $id_categorie ?>"><img class="img_categorie" src="./images/categories/<?php echo $image_categorie ?>" /></a>
		<h1><a href="./index.php?page=recettes&idc=<?php echo $id_categorie ?>"><?php echo $nom_categorie ?></a></h1>
		<p>Il y a actuellement <?php echo $nb_recettes ?> recettes dans cette catégorie.<br />
		<a href="index.php?page=recettes&idc=<?php echo $id_categorie ?>" >Voir les recettes</a><br />
		<a href="index.php?page=ajouter_recette&idc=<?php echo $id_categorie ?>" >Ajouter une recette</a><p>
		</div>
<?php endforeach; ?>



	</div>
	</div>

</body>
</html>