
{extends 'main.tpl'}
{block name="titre"}Editer recette{/block}
{block name="output_area"}
<div id="editer_recette">
	{if $erreur|default:''}Erreur : certains champs sont ivalides{/if}
	<form method="post">
		Titre de la recette <span class="form_obligatoire" >*</span> :
			<input name="titre" type="text" size="25" {if $recette|default:''}value="{$recette['titre']}"{/if}><br />
		Catégorie(s) <span class="form_obligatoire" >*</span> :
			<input type="checkbox" value="1" name="categorie_entree" {if $recette['categorie_entree']|default:''}checked="checked"{/if}>Entrée
			<input type="checkbox" value="2" name="categorie_plat" {if $recette['categorie_plat']|default:''}checked="checked"{/if}>Plat
			<input type="checkbox" value="3" name="categorie_dessert" {if $recette['categorie_dessert']|default:''}checked="checked"{/if}>Dessert
			<br />
		Nombre de personnes :
			<input name="nb_pers" type="number" size="2" {if $recette|default:''}value="{$recette['nb_pers']}"{else}value="1"{/if} >
			<br />
		Temps de préparation :
			<input name="tps_h" type="number" size="2" {if $recette|default:''}value="{$recette['tps_h']}">{else}value="1">{/if} > heures
			<input name="tps_m" type="number" size="2" {if $recette|default:''}value="{$recette['tps_m']}">{else}value="0">{/if} > minutes
			<input name="tps_s" type="number" size="2" {if $recette|default:''}value="{$recette['tps_s']}">{else}value="0">{/if} > secondes
			<br />
		Difficulté :
			<select name="difficulte" >
				<option value="1" >Facile</option>
				<option value="2" >Moyen</option>
				<option value="3" >Difficile</option>
			</select>
			<br />
		<fieldset>
			<legend>Description de la recette <span class="form_obligatoire" >*</span></legend>
			<textarea name="texte_recette" >{if $recette|default:''}{$recette['texte_recette']}{/if}</textarea>
		</fieldset>
		Image de la recette :
			<input type="file" name="image_recette" />
			<br />
		<input type="submit"> <input type="reset">
	</form>
</div>
{/block}
