
<div class="recette">
	<p><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}">
	{if is_null($recette->image_recette)}
		<img class="img_recette" src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="150" width="150" />
	{else}
		<img class="img_recette" src="{base_url('images/'|cat:$recette->login|cat:'/'|cat:$recette->titre|cat:'/'|cat:$recette->image_recette)}" alt="Illustration recette" height="150" width="150" />
	{/if}
	</a></p>
	<h3><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}"> {$recette->titre}</a></h3>
	<h4>Le {$recette->date_recette} par <a href="{base_url('index.php/Membre/profil/'|cat:$recette->id_utilisateur)}">{$recette->login}</a></h4>
	<p class="texte_recette">{$recette->recette|truncate:250} <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}"> Lire la suite</a></p>
	<p>Catégories :
		{foreach $recette->liste_categories as $categorie_recette}
			<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
		{/foreach}
	</p>
</div>
