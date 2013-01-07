
{extends 'main.tpl'}
{block name="titre"}Liste des recettes{/block}
{block name="output_area"}
<div id="body">
	<div id="liste_categories">
		<div id="categorie_selection">
			<img class="img_categorie" src="{base_url('images/categories/'|cat:$categorie->image_categorie)}" />
			<h1>{$categorie->nom_categorie}</h1>
		</div>
	</div>
	{if $recettes|default:''}
		<div id="liste_recettes">
			{foreach $recettes as $line}
				{include file='preview_recette.tpl' recette=$line inline nocache}
			{/foreach}
		</div>
	{else}
		<p style="text-align: center;" >Il n'y a actuellement aucune recette dans cette catégorie.</p>
	{/if}
</div>
{/block}
