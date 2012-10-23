<?php
	function loadPageContent($file) {
		if (is_file($file)) {
			ob_start();
			include $file;
			$file_content = ob_get_contents();
			ob_end_clean();
			return $file_content;
		}
		else
			return "Le fichier '$file' n'a pas été trouvé.";
	}
	
	function render($_S, $layout) {
		if (is_file($layout))
			include $layout;
		else
			die("Le fichier layout '$layout' n'a pas été trouvé.");
	}
	
	function pageExists($_page, $_P) {
		
		foreach ($_P as $page_name=> $tmp) {
			if ($_page == $page_name)
				return true;
		}
		return false;
	}
	
	function getPDO_BDD() {
		global $PDO_BDD;
		return $PDO_BDD;
	}
	
	function formatTime($unformated_time) {
		$time = explode(":", $unformated_time);
		
		if (!($time[0] > 0 or $time[1] > 0 or $time[2] > 0))		// Dans le cas où le temps vaut 0
			return '0h 0 min 0 sec';
		if ($time[0] > 0)
			$result = intval($time[0]).'h';
		if ($time[1] > 0) {
			if (isset($result)) $result .= ' '; else $result = '';	// On s'assure de l'existance de $result
			$result .= intval($time[1]).' min';
		}
		if ($time[2] > 0) {
			if (isset($result)) $result .= ' '; else $result = '';	// On s'assure de l'existance de $result
			$result .= intval($time[2]).' sec';
		}
		
		return $result;
	}
	
	function formatDate($unformated_date) {
		$date = explode("-", $unformated_date);
		return $date[2].'/'.$date[1].'/'.$date[0];
	}
	
	function formatIngredient($quantite, $unite, $ingredient) {
		$result = $quantite.' ';
		if ($unite != 'Sans unité')
			$result .= $unite.' de ';
		$result .= $ingredient;
		return $result;
	}
	
	function getDifficulte($difficulte) {
		switch ($difficulte) {
			case 0:
				return 'Non précisée';
				break;
			case 1:
				return 'Facile';
				break;
			case 2:
				return 'Moyenne';
				break;
			case 3:
				return 'Difficile';
				break;
			default:
				return 'Difficulté inconnue';
		}
	}
	
	function previewRecette($id_recette) {
		
		$PDO_BDD = getPDO_BDD();
		
		$request_recette = <<< EOF
		SELECT*
		FROM recette
		WHERE id_recette = $id_recette;
EOF;
		$request_utlisateur = <<< EOF
		SELECT U.id_utilisateur, login, nom_utilisateur, prenom
		FROM recette R INNER JOIN utilisateur U ON R.id_utilisateur=U.id_utilisateur
		WHERE id_recette = $id_recette;
EOF;
		$request_categorie = <<< EOF
		SELECT C.id_categorie, nom_categorie
		FROM recette R INNER JOIN appartient A ON R.id_recette=A.id_recette
		INNER JOIN categorie C ON A.id_categorie=C.id_categorie
		WHERE R.id_recette = $id_recette;
EOF;
		
		try { $result_recette=$PDO_BDD->query($request_recette); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		try { $result_utlisateur=$PDO_BDD->query($request_utlisateur); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		try { $result_categorie=$PDO_BDD->query($request_categorie); }
		catch (Exception $err)
		{ die ('Erreur : '.$err->getMessage()); }
		
		
		if ($result_utlisateur->rowCount() > 0
		and $result_categorie->rowCount() > 0
		and $result_recette->rowCount() > 0) {
			
			$result_utlisateur	= $result_utlisateur->fetchAll(PDO::FETCH_ASSOC);
			$result_categorie	= $result_categorie->fetchAll(PDO::FETCH_ASSOC);
			$result_recette		= $result_recette->fetchAll(PDO::FETCH_ASSOC);
			
			$line = $result_recette[0];
			
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
			$id_utilisateur		= $result_utlisateur[0]['id_utilisateur'];
			$lien_page_detail	= '<a href="./index.php?page=detail&idr='.$id_recette.'">';
			
			if (is_null($line['image_recette'])) {
				$image_recette = 'images/default/recette.png';
			}
			else
				$image_recette = 'images/'.$nom_utilisateur.'/'.$titre_recette.'/'.$line['image_recette'];
			
			$resultat= <<< EOF
<div class="recette">
	<p>$lien_page_detail<img class="img_recette" src="$image_recette" alt="Illustration recette" height="150" width="150" /></a></p>
	<h3>$lien_page_detail $titre_recette</a></h3>
	<h4>Le $date_recette par <a href="./index.php?page=profil&idp=$id_utilisateur">$nom_utilisateur</a></h4>
	<p class="texte_recette">$texte_recette $lien_page_detail Lire la suite</a></p>
	<p>$categories_recette</p>
</div>
EOF;

			return $resultat;
		}
		else
			return '';
	}
?>