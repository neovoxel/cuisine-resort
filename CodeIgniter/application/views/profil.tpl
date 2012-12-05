{extends 'main.tpl'}
{block name="titre"}Profil de {$utilisateur->login}{/block}
{block name="output_area"}
<div id="profil">
	<div id="profil_details">
		<h1>Profil de {$utilisateur->login}</h1>
		<p>{$utilisateur->type_utilisateur}<br />
		Nom : {$utilisateur->nom_utilisateur}<br />
		Prénom : {$utilisateur->prenom}<br />
		e-mail : {$utilisateur->email}<br />
		Inscrit le :<br /></p>
		<hr />
	</div>
	<div id="profil_recettes">
		<h2>Recettes de {$utilisateur->login}</h2>

		<div id="liste_recettes">
		{foreach $recettes as $line}
			{include file='preview_recette.tpl' showUser=0 recette=$line inline nocache}
		{/foreach}
		</div>
		<hr />
	</div>
	<div id="profil_commentaires">
		<h2>Commentaires de {$utilisateur->login}</h2>
		<div id="liste_commentaires">
		{foreach $commentaire as $line}
			{include file='preview_commentaire.tpl' showUser=0 com=$line inline nocache}
		{/foreach}
		</div>
	</div>
	</div>
{/block}
