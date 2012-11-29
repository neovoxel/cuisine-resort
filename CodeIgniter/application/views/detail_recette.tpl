
{extends 'main.tpl'}
{block name="titre"}Détail recette{/block}
{block name="output_area"}
<div id="body">
{if $recette|default:''}
<div id="detail_recette">
		<div id="presentation">
			<img class="img_recette" src="$image_recette" alt="Illustration recette" height="300" width="300" />
			<h1>{$recette->titre}</h1>
			<ul>
				<li>Catégories :
					{foreach $recette->liste_categories as $categorie_recette}
						<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
					{/foreach}</li>
				<li>Préparation : {$recette->temps_prepar}</li>
				<li>Difficulté : {$recette->difficulte}</li>
				<li>Nombre de personnes : {$recette->nb_pers}</li>
			</ul>
			<p class="auteur_recette">Recette proposée le {$recette->date_recette} par <a href="./index.php?page=profil&idp=$id_utilisateur">$nom_utilisateur</a></p>
			<hr />
		</div>
		<div id="ingredients">
			<h2>Ingrédients :</h2>
			<ul>

		foreach ($result_ingredients as $line)
			echo '<li>'.formatIngredient($line['quantite'], $line['nom_unite'], $line['nom_ingredient']).'</li>';
		echo <<< EOF
			</ul>
		<hr />
		</div>
		<div id="preparation">
			<h2>Préparation : ({$recette->temps_prepar})</h2>
			<p>{$recette->recette}</p>
			<hr />
		</div>


		if (!empty($result_commentaires)) {
			echo <<< EOF
			<h2>Commentaires :</h2>
			<div id="liste_commentaires">

			
			foreach ($result_commentaires as $line)
				echo previewCommentaire($line['id_com']);
			
</div>

{else}
	<div>Erreur : $categories vide !</div>
{/if}
</div>
{/block}
