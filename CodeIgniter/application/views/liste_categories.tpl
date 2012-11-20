
{extends 'main.tpl'}
{block name="titre"}Liste des catégories{/block}
{block name="output_area"}
<div id="body">
{if $categories|default:''}
	<div id="contenu">
	<div id="liste_categories">
		{foreach $categories as $line}
			<div class="categorie" >
				<a href="{base_url('index.php/recettes/liste_recettes/'|cat:$line->id_categorie)}"><img class="img_categorie" src="{base_url('images/categories/'|cat:$line->image_categorie)}" /></a>
				<h1><a href="{base_url('index.php/recettes/liste_recettes/'|cat:$line->id_categorie)}">{$line->nom_categorie}</a></h1>
				<p>Il y a actuellement 0 recettes dans cette catégorie.<br />
				<a href="{base_url('index.php/recettes/liste_recettes/'|cat:$line->id_categorie)}" >Voir les recettes</a><br />
				<a href="index.php?page=ajouter_recette&idc={$line->id_categorie}" >Ajouter une recette</a><p>
			</div>
		{/foreach}
	</div>
	</div>

{else}
	<div>Erreur : $categories vide !</div>
{/if}
</div>
{/block}
