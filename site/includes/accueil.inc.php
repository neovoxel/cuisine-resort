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
	
	foreach ($result_recettes as $line)
		echo previewRecette($line['id_recette']);
	
}
else
	echo 'Il n\'y a aucune recette.';
?>
</div>
</div>
