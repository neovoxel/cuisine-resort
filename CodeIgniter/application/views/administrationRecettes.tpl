
{extends 'main.tpl'}
{block name="titre"}Welcome{/block}
{block name="scripts_area"}
<script type="text/javascript" >
	function delete_recette()
	{ return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?'); }
</script>
{/block}
{block name="output_area"}
<div id="body">
<h1>Administration des recettes</h1>
	<div class="table">
		<div class="trow">
			<div class="cell">Image</div>
			<div class="cell">Titre</div>
			<div class="cell">Auteur</div>
			<div class="cell">Date</div>
			<div class="cell">Catégories</div>
			<div class="cell">Etat</div>
			<div class="cell">Action</div>
		</div>
		{foreach $recettes as $recette}
			{if $recette->etat!="private"}
			<div class="row">
				<div class="cell">
					{if is_null($recette->image_recette)}
						<img src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="50" width="50" />
					{else}
						<img src="{base_url('images/'|cat:$recette->login|cat:'/'|cat:$recette->id_recette|cat:'/'|cat:$recette->image_recette)}" alt="Illustration recette" height="50" width="50" />
					{/if}
				</div>
				<div class="cell"><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}">{$recette->titre}</a></div>
				<div class="cell"><a href="{base_url('index.php/home/profil/'|cat:$recette->id_utilisateur)}">{$recette->login}</a></div>
				<div class="cell">{$recette->date_recette}</div>
				<div class="cell">
					{foreach $recette->liste_categories as $categorie_recette}
						<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
					{/foreach}
				</div>
				<div class="cell"><img src="{base_url('images/'|cat:$recette->etat|cat:'.png')}" alt="{$recette->etat}" title="{$recette->etat}" height="24" width="24" /></div>
				<div class="cell">
					Valider
					Supprimer
					<!--<form class="img_edit_recette" action="{base_url('index.php/Membre/supprimerRecette')}" method="post" >
						<input type="hidden" name="id_recette" value="{$recette->id_recette}">
						<input border=0 src="{base_url('images/sup_recette.png')}" type=image align="middle" name="form_supp_recette" value="submit" onclick="javascript:return delete_recette()" >
					</form>-->
				</div>
			</div>
			{/if}
		{/foreach}
	</div>
</div>
{/block}
