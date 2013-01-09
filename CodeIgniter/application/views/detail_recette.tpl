
{extends 'main.tpl'}
{block name="titre"}Détail recette{/block}
{block name="scripts_area"}
<script type="text/javascript" >
	function delete_com()
	{ return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?'); }
	function delete_recette()
	{ return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?'); }
</script>
{/block}
{block name="output_area"}
<div id="body">
{if $recette|default:''}
	{$display=0}
	{if $recette->etat=="public"}{$display=1}
	{elseif $ci->_isAdmin()}{$display=1}
	{elseif $ci->_isLogOn()}
		{if $ci->getUser()->userdata('id_utilisateur')==$utilisateur->id_utilisateur}{$display=1}
		{/if}
	{/if}
	{if $display==1}
	<div id="detail_recette">
		<div id="presentation">
			{if is_null($recette->image_recette)}
				<img class="img_recette" src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="300" width="300" />
			{else}
				<img class="img_recette" src="{base_url('images/'|cat:$utilisateur->login|cat:'/'|cat:$recette->id_recette|cat:'/'|cat:$recette->image_recette)}" alt="Illustration recette" height="300" width="300" />
			{/if}
			
			<h1>{$recette->titre}
			{if $ci->_isLogOn() && $ci->getUser()->userdata('id_utilisateur')==$utilisateur->id_utilisateur}
				<a href="{base_url('index.php/Membre/editerRecette/'|cat:$recette->id_recette)}" ><img src="{base_url('images/edit_recette.gif')}" title="Editer la recette" alt="Editer la recette" height="24" width="24" /></a>
			{/if}
			</h1>
			
			{if $recette->etat!="public"}{include file='info_etat_recette.tpl' etat=$recette->etat inline nocache}{/if}
			
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
			<h2>Ingrédients</h2>
			<ul>
			{foreach $ingredients as $ingredient}
				<li>{$ingredient->quantite} {$ingredient->nom_unite} {$ingredient->nom_ingredient}</li>
			{/foreach}
			</ul>
		<hr />
		</div>
		<div id="preparation">
			<h2>Préparation ({$recette->temps_prepar})</h2>
			<p>{nl2br($recette->recette)}</p>
			<hr />
		</div>
		
		<h2>Commentaires</h2>
		{if !is_null($commentaires)}
			<div id="liste_commentaires">
			{foreach $commentaires as $line}
				{include file='preview_commentaire.tpl' redirectTo='Recettes/detail_recette/'|cat:$recette->id_recette showRecette=0 com=$line inline nocache}
			{/foreach}
			</div>
		{else}
			<p>Il n'y a aucun commentaire sur cette recette.</p>
		{/if}
		
		{if $recette->etat=="public"}
			{include file='add_commentaire.tpl' redirectTo='Recettes/detail_recette/'|cat:$recette->id_recette id_recette=$recette->id_recette inline nocache}
		{/if}
	</div>
	{else}
		<p>Vous n'avez pas accès à cette recette.</p>
	{/if}
{else}
	<div>Erreur !</div>
{/if}
</div>
{/block}
