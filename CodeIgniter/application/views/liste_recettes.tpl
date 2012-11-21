
{extends 'main.tpl'}
{block name="titre"}Liste des recettes{/block}
{block name="output_area"}
<div id="body">
{if $recettes|default:''}
	<div id="liste_categories">
	<div id="categorie_selection">
		<img class="img_categorie" src="{base_url('images/categories/'|cat:$categorie->image_categorie)}" />
		<h1>{$categorie->nom_categorie}</h1>
	</div>
	</div>
	<div id="liste_recettes">
		{foreach $recettes as $line}
			<div class="recette">
				<p><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}">
				<img class="img_recette" src="{base_url('images/'|cat:$line->login|cat:'/'|cat:$line->titre|cat:'/'|cat:$line->image_recette)}" alt="Illustration recette" height="150" width="150" />
				{if isNull($line->image_recette)}</a></p>
				<h3><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}"> {$line->titre}</a></h3>
				<h4>Le {$line->date_recette} par <a href="{base_url('index.php/Membre/profil/'|cat:$line->id_utilisateur)}">{$line->login}</a></h4>
				<p class="texte_recette">{$line->recette|truncate:250} <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}"> Lire la suite</a></p>
				<p>Catégories :
					{foreach $line->liste_categories as $categorie_recette}
						<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
					{/foreach}
				</p>
			</div>
		{/foreach}
	</div>

{else}
	<div>Erreur : $recettes vide !</div>
{/if}
</div>
{/block}
