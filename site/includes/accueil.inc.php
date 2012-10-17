<div id="accueil">
<h1>Bienvenue sur Cuisine-Resort !</h1>

<h2>Dernières recettes :</h2>

<div id="liste_recettes">
<?php

$request_recettes = <<< EOF
SELECT *
FROM recette
ORDER BY date_recette DESC
LIMIT 0, 5
EOF;

$PDO_BDD = getPDO_BDD();

try { $result_recettes=$PDO_BDD->query($request_recettes); }
catch (Exception $err)
{ die ('Erreur : '.$err->getMessage()); }

if ($result_recettes->rowCount() > 0) {
	$result_recettes = $result_recettes->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($result_recettes as $line) {
		$id_recette		= $line['id_recette'];
		
		$request_utlisateur = <<< EOF
		SELECT login, nom_utilisateur, prenom
		FROM recette R INNER JOIN utilisateur U ON R.id_utilisateur=U.id_utilisateur
		WHERE id_recette = $id_recette;
EOF;
		$request_categorie = <<< EOF
		SELECT C.id_categorie, nom_categorie
		FROM recette R INNER JOIN appartient A ON R.id_recette=A.id_recette
		INNER JOIN categorie C ON A.id_categorie=C.id_categorie
		WHERE R.id_recette = $id_recette;
EOF;
		
		try { $result_utlisateur=$PDO_BDD->query($request_utlisateur); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		try { $result_categorie=$PDO_BDD->query($request_categorie); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		
		if ($result_utlisateur->rowCount() > 0
		and $result_categorie->rowCount() > 0) {
			
			$result_utlisateur	= $result_utlisateur->fetchAll(PDO::FETCH_ASSOC);
			$result_categorie	= $result_categorie->fetchAll(PDO::FETCH_ASSOC);
			
			$categories_recette = 'Catégorie';
			if (count($result_categorie) > 1)
				$categories_recette .= 's';
			$categories_recette .= ' : ';
			foreach ($result_categorie as $value) {
				$categories_recette .= '<a href="./index.php?page=recettes&idc='.$value['id_categorie'].'">'.$value['nom_categorie'].'</a> ';
			}
			
			$titre_recette		= $line['titre'];
			$texte_recette		= substr($line['recette'], 0, 250).'...';
			$date_recette		= formatDate($line['date_recette']);
			$nom_utilisateur	= $result_utlisateur[0]['login'];
			$lien_page_detail	= '<a href="./index.php?page=detail&idr='.$id_recette.'">';
			
			if (is_null($line['image_recette'])) {
				$image_recette = 'images/default/recette.png';
			}
			else
				$image_recette = 'images/'.$nom_utilisateur.'/'.$titre_recette.'/'.$line['image_recette'];
			
			echo <<< EOF
<div class="recette">
	<p>$lien_page_detail<img class="img_recette" src="$image_recette" alt="Illustration recette" height="150" width="150" /></a></p>
	<h3>$lien_page_detail $titre_recette</a></h3>
	<h4>Le $date_recette par <a href="./index.php?page=profil&idp=2">$nom_utilisateur</a></h4>
	<p class="texte_recette">$texte_recette $lien_page_detail Lire la suite</a></p>
	<p>$categories_recette</p>
</div>
EOF;
		}
	}
	
}
else
	echo 'Il n\'y a aucune recette.';
?>
</div>
</div>
