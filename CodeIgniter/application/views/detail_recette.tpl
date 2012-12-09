
{extends 'main.tpl'}
{block name="titre"}Détail recette{/block}
{block name="output_area"}
<div id="body">
{if $recette|default:''}
<div id="detail_recette">
		<div id="presentation">
			{if is_null($recette->image_recette)}
				<img class="img_recette" src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="300" width="300" />
			{else}
				<img class="img_recette" src="{base_url('images/'|cat:$utilisateur->login|cat:'/'|cat:$recette->titre|cat:'/'|cat:$recette->image_recette)}" alt="Illustration recette" height="300" width="300" />
			{/if}
			
			<h1>{$recette->titre} {if $ci->_isLogOn() && $ci->getUser()->userdata('id_utilisateur')==$utilisateur->id_utilisateur}<img src="{base_url('images/edit_recette.gif')}" title="Editer la recette" alt="Editer la recette" height="24" width="24" />{/if}</h1>
			<ul>
				<li>Catégories :
					{foreach $recette->liste_categories as $categorie_recette}
						<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
					{/foreach}
				</li>
				<li>Préparation : {$recette->temps_prepar}</li>
				<li>Difficulté : {$recette->difficulte}</li>
				<li>Nombre de personnes : {$recette->nb_pers}</li>
			</ul>
			<p class="auteur_recette">Recette proposée le {$recette->date_recette} par <a href="{base_url('index.php/home/profil/'|cat:$utilisateur->id_utilisateur)}">{$utilisateur->login}</a></p>
			<hr />
		</div>
		<div id="ingredients">
			<h2>Ingrédients :</h2>
			<ul>
			{foreach $ingredients as $ingredient}
				<li>{$ingredient->quantite} {$ingredient->nom_unite} {$ingredient->nom_ingredient}</li>
			{/foreach}
			</ul>
		<hr />
		</div>
		<div id="preparation">
			<h2>Préparation : ({$recette->temps_prepar})</h2>
			<p>{$recette->recette}</p>
			<hr />
		</div>

		{if !is_null($commentaires)}
			<h2>Commentaires :</h2>
			<div id="liste_commentaires">
			{foreach $commentaires as $line}
				{include file='preview_commentaire.tpl' showRecette=0 com=$line inline nocache}
			{/foreach}
			</div>
		{/if}

{else}
	<div>Erreur : $categories vide !</div>
{/if}
</div>
{/block}
