{extends 'main.tpl'}
{block name="titre"}Rechercher{/block}
{block name="output_area"}
<div id="body">
	<form action="{base_url('index.php/home/rechercher')}" method="post">
	<label>Nom recette: </label><input name="nomRecette" type="text" size="25"><br/>
	<label>Nom auteur: </label><input name="nomAuteur" type="text" size="25"><br/>
	<label>Catégorie: </label><select name="categorie[]" size="1" multiple>
								<option value="NaN">Indéterminé</option>
								{foreach $categorie as $line}
								<option value="{$line->id_categorie}">{$line->nom_categorie}</option>
								{/foreach}
							   </select><br/>
	<label>Ingredient: </label><select name="ingredient[]" size="1" multiple>
								<option value="NaN">Indéterminé</option>
								{foreach $ingredient as $line}
								<option value="{$line->id_ingredient}">{$line->nom_ingredient}</option>
								{/foreach}
							   </select><br/>
	<label>Difficulté: </label><select name="difficulte[]" size="1" multiple>
								<option value="NaN">Indéterminé</option>
								{foreach $difficulte as $line}
								<option value="{$line->difficulte}">{$line->difficulte}</option>
								{/foreach}
							   </select><br/>
	<label>Nombre personnes: </label><select name="nbPerso[]" size="1" multiple>
								<option value="NaN">Indéterminé</option>
								{foreach $nbPerso as $line}
								<option value="{$line->nb_pers}">{$line->nb_pers}</option>
								{/foreach}
							   </select><br/>
	<input type="submit" name="form_log" value="Rechercher">
	</form>
	{if $ok|default:false}
	Résultats correspondant trouvés: {count($result)}
	{foreach $result as $line}
		{include file='preview_recette.tpl' recette=$line inline nocache}
	{/foreach}
	{/if}	
</div>
{/block}
