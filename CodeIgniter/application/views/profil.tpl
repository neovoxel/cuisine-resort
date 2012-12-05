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
			<!-- <div class="recette">
				<p><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}">
				{if is_null($line->image_recette)}
					<img class="img_recette" src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="150" width="150" />
				{else}
					<img class="img_recette" src="{base_url('images/'|cat:$utilisateur->login|cat:'/'|cat:$line->titre|cat:'/'|cat:$line->image_recette)}" alt="Illustration recette" height="150" width="150" />
				{/if}
				</a></p>
				<h3><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}"> {$line->titre}</a></h3>
				<h4>Le {$line->date_recette} par <a href="{base_url('index.php/Membre/profil/'|cat:$line->id_utilisateur)}">{$utilisateur->login}</a></h4>
				<p class="texte_recette">{$line->recette|truncate:250} <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}"> Lire la suite</a></p>
				<p>Catégories :
					{foreach $line->liste_categories as $categorie_recette}
						<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
					{/foreach}
				</p>
			</div> -->
			{include file='preview_recette.tpl' recette=$line inline nocache}
		{/foreach}
		</div>
			<hr />
		</div>
		<div id="profil_commentaires">
			<h2>Commentaires de {$utilisateur->login}</h2>
			<div id="liste_commentaires">
			{foreach $commentaire as $line}
				<div class="commentaire">
					<h4>Le {$line->date_com} sur la recette <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$line->id_recette)}">{$line->titre}</a></h4>
					<p>{$line->commentaire}</p>
				</div>
			{/foreach}
			</div>
		</div>
		</div>
{/block}
