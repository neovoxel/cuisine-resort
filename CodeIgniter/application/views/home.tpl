
{extends 'main.tpl'}
{block name="titre"}Welcome{/block}
{block name="output_area"}
<div id="body">

<p><h2>Bonjour! Voici les dernières recettes:</h2></p>
<div id="liste_recettes">
		{foreach $recettes as $line}
			{include file='preview_recette.tpl' recette=$line inline nocache}
		{/foreach}
	</div>

</div>
{/block}
