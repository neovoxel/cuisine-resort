{extends 'main.tpl'}
{block name="titre"}Profil de {$utilisateur->login}{/block}
{block name="scripts_area"}
<script type="text/javascript" >
	function delete_com()
	{ return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?'); }
	function delete_recette()
	{ return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?'); }
</script>
{/block}
{block name="output_area"}
<div id="mon_profil">
	{if $erreur|default:''}<span style="color:red;">{$erreur}</span>{/if}
	<div id="profil_details">
		<h2>Informations personnelles <a href="{base_url('index.php/Membre/edit')}"><img src="{base_url('images/edit_recette.gif')}" alt="Editer profil"></a></h2>
		<p>{if $utilisateur->type_utilisateur==1}Administrateur{else}Membre{/if}<br />
		Nom : {$utilisateur->nom_utilisateur}<br />
		Prénom : {$utilisateur->prenom}<br />
		e-mail : {$utilisateur->email}<br />
		Inscrit le :<br /></p>
		<hr />
	</div>
	<div id="profil_recettes">
		<h2>Mes recettes ({count($recettes)})</h2>
		
		<p><a href="{base_url('index.php/Membre/ajouterRecette')}" ><img src="{base_url('images/ajouter_recette.png')}" title="Ajouter une recette" alt="Ajouter une recette" /></a></p>
		
		<div id="liste_recettes">
		{foreach $recettes as $line}
			{include file='preview_recette.tpl' showUser=0 showEtat=1 recette=$line inline nocache}
		{/foreach}
		</div>
		
		<hr />
	</div>
	<div id="profil_commentaires">
		<h2>Mes commentaires ({count($commentaire)})</h2>
		<div id="liste_commentaires">
		{foreach $commentaire as $line}
			{include file='preview_commentaire.tpl' redirectTo='home/profil/'|cat:$utilisateur->id_utilisateur showUser=0 com=$line inline nocache}
		{/foreach}
		</div>
	</div>
</div>
{/block}
