
{extends 'main.tpl'}
{block name="titre"}Editer recette{/block}
{block name="output_area"}

<script type="text/javascript" >
	function getSelectValue(selectId) {
		var selectElmt = document.getElementById(selectId);
		return selectElmt.options[selectElmt.selectedIndex].value;
	}
	
	function getSelectText(selectId) {
		var selectElmt = document.getElementById(selectId);
		return selectElmt.options[selectElmt.selectedIndex].text;
	}
	
	function appendValue(element, value) {
		if (document.getElementsByName(element)[0].value != "")
			document.getElementsByName(element)[0].value += ";" + value;
		else
			document.getElementsByName(element)[0].value = value;
	}
	
	function ajouterIngredient() {
		if (document.getElementById("quantite").value <= 0 || getSelectValue("unite") == 0 || getSelectValue("ingredient") == 0)
			return alert("Erreur : Quantité / Unité / Ingrédient invalide");
		
		var quantite = document.getElementById("quantite").value;
		var unite = getSelectText("unite");
		var ingredient = getSelectText("ingredient");
		var image = "<img src=\"{base_url('images/sup_ingredient.gif')}\" title=\"Supprimer ingrédient\" />";
		
		var text  = "<div class=\"row\" >";
			text += "<span class=\"cell\">" + quantite + "</span>";
			text += "<span class=\"cell\">" + unite + "</span>";
			text += "<span class=\"cell\">" + ingredient + "</span>";
			text += "<span class=\"cell\">" + image + "</span>";
			text += "</div>";
		document.getElementById("ingredients_ajoutes").innerHTML += text;
		//getElementsByClassName('robert');
		
		appendValue("quantites", quantite);
		appendValue("unites", getSelectValue("unite"));
		appendValue("ingredients", getSelectValue("ingredient"));
	}
</script>

<div id="editer_recette">
	{if $erreur|default:''}Erreur : certains champs sont invalides{/if}
	<form method="post">
		Titre de la recette <span class="form_obligatoire" >*</span> :
			<input name="titre" type="text" size="25" {if $recette|default:''}value="{$recette['titre']}"{/if}>
			<br />
			
		Catégorie(s) <span class="form_obligatoire" >*</span> :
			{foreach $categories as $line}
				<input type="checkbox" value="{$line->id_categorie}" name="categorie_{$line->id_categorie}" {if $recette['categorie_'|cat:$line->id_categorie]|default:''}checked="checked"{/if}>{$line->nom_categorie}
			{/foreach}
			<br />
			
		Nombre de personnes :
			<input name="nb_pers" type="number" size="2" {if $recette|default:''}value="{$recette['nb_pers']}"{else}value="1"{/if} >
			<br />
			
		Temps de préparation :
			<input name="tps_h" type="number" size="2" {if $recette|default:''}value="{$recette['tps_h']}">{else}value="1">{/if} heures
			<input name="tps_m" type="number" size="2" {if $recette|default:''}value="{$recette['tps_m']}">{else}value="0">{/if} minutes
			<input name="tps_s" type="number" size="2" {if $recette|default:''}value="{$recette['tps_s']}">{else}value="0">{/if} secondes
			<br />
			
		Difficulté :
			<select name="difficulte" >
				<option value="facile" >Facile</option>
				<option value="moyen" >Moyen</option>
				<option value="difficile" >Difficile</option>
				<option value="Tdifficile" >Très difficile</option>
			</select>
			<br />
			
		<fieldset style="text-align: center;">
			<legend>Ingrédients</legend>
			<input type="hidden" name="quantites" value="">
			<input type="hidden" name="unites" value="">
			<input type="hidden" name="ingredients" value="">
			
			<div id="ingredients_ajoutes" class="table">
				<div class="trow">
					<span class="cell">Quantité</span>
					<span class="cell">Unité</span>
					<span class="cell">Ingrédient</span>
					<span class="cell">Action</span>
				</div>
			</div>
			<br />
			
			<input id="quantite" type="number" size="2" value="1" >
			<select id="unite" >
				<option value="0" >Sélectionnez une unité</option>
				{foreach $unites as $line}
					<option value="{$line->id_unite}" >{$line->nom_unite}</option>
				{/foreach}
			</select>
			<select id="ingredient" >
				<option value="0" >Sélectionnez un ingrédient</option>
				{foreach $ingredients as $line}
					<option value="{$line->id_ingredient}" >{$line->nom_ingredient}</option>
				{/foreach}
			</select>
			<input type="button" onclick="javascript:ajouterIngredient()" value="Ajouter l'ingrédient" >
		</fieldset>
		<br />
		
		<fieldset style="text-align: center;">
			<legend>Description de la recette <span class="form_obligatoire" >*</span></legend>
			<textarea name="texte_recette" >{if $recette|default:''}{$recette['texte_recette']}{/if}</textarea>
		</fieldset>
		<br />
		
		Image de la recette :
			<input type="file" name="image_recette" />
			<br />
			
		<input type="submit" value="Sauvegarder" > <input type="reset">
	</form>
</div>
{/block}
