{extends 'main.tpl'}
{block name="titre"}Liste des catégories{/block}
{block name="output_area"}
<div id="profil">
		<div id="profil_details">
			<h1>Profil de {$utilisateur->login}</h1>
			<p>{$utilisateur->type_utilisateur}<br />
			Nom : {$utilisateur->nom_utilisateur}<br />
			Prénom : {$utilisateur->prenom}<br />
			e-mail : {$utilisateur->email}<br />
			Inscrit le :<br /></p>
			<hr />
		</div>
		<div id="profil_recettes">
			<h2>Recettes de $login</h2>
EOF;
		if($result_recettes !== false) {
			echo '<div id="liste_recettes">';
			foreach ($result_recettes as $line)
					echo previewRecette($line['id_recette']);
			echo '</div>';
		}
		else
			echo 'Cet utilisateur n\'a écrit aucune recette.';
					
		echo <<< EOF
			<hr />
		</div>
		<div id="profil_commentaires">
		<h2>Commentaires de $login</h2>
		</div>
		</div>
{/block}
