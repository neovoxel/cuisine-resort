
{extends 'main.tpl'}
{block name="titre"}Liste des recettes{/block}
{block name="output_area"}
<div id="body">
{if $recettes|default:''}
	<div id="contenu">
	<div id="categorie_selection">
		<img class="img_categorie" src="{base_url('images/categories/'|cat:$categorie->image_categorie)}" />
		<h1>{$categorie->nom_categorie}</h1>
	</div>
	<div id="liste_recettes">
		{foreach $recettes as $line}
			<div class="recette">
				<p><a href="{base_url('index.php/recettes/detail_recette/'|cat:$line->id_recette)}"><img class="img_recette" src="images/default/recette.png" alt="Illustration recette" height="150" width="150" /></a></p>
				<h3><a href="{base_url('index.php/recettes/detail_recette/'|cat:$line->id_recette)}"> {$line->titre}</a></h3>
				<h4>Le {$line->date_recette} par <a href="{base_url('index.php/utilisateur/liste_categories/'|cat:$line->id_categorie)}">$nom_utilisateur</a></h4>
				<p class="texte_recette">$texte_recette <a href="{base_url('index.php/recettes/detail_recette/'|cat:$line->id_recette)}"> Lire la suite</a></p>
				<p><a href="{base_url('index.php/recettes/liste_categories/'|cat:$line->id_categorie)}">{$line->id_categorie}</a></p>
			</div>
		{/foreach}
	</div>
	</div>

{else}
	<div>Erreur : $recettes vide !</div>
{/if}
</div>
{/block}
