
{extends 'main.tpl'}
{block name="titre"}Welcome{/block}
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
<h2>Bonjour! Voici les dernières recettes:</h2>
	<div id="liste_recettes">
		{foreach $recettes as $line}
			{include file='preview_recette.tpl' recette=$line inline nocache}
		{/foreach}
	</div>
</div>
{/block}
