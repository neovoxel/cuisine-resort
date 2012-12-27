
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
	
	function resetSelect(selectId) {
		var selectElmt = document.getElementById(selectId);
		selectElmt.options[selectElmt.selectedIndex].selected = false;
		selectElmt.options[0].selected = true;
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
		var id_ingredient = quantite + "_" + getSelectValue("unite") + "_" + getSelectValue("ingredient") + "_" + Math.round(Math.random()*100000);
		var action = '<a href="javascript:supprimerIngredient(\'' + id_ingredient + '\')" ><img src="{base_url(\'images/sup_ingredient.gif\')}" alt="Supprimer ingrédient" title="Supprimer ingrédient" /></a>';
		
		var text  = '<div class="' + id_ingredient + '" style="display: table-row;" >';
			text += '<span class="cell">' + quantite	+ "</span>";
			text += '<span class="cell">' + unite		+ "</span>";
			text += '<span class="cell">' + ingredient	+ "</span>";
			text += '<span class="cell">' + action		+ "</span>";
			text += "</div>";
		document.getElementById("ingredients_ajoutes").innerHTML += text;
		
		appendValue("quantites", quantite);
		appendValue("unites", getSelectValue("unite"));
		appendValue("ingredients", getSelectValue("ingredient"));
		appendValue("ids", id_ingredient);
		
		document.getElementById("quantite").value = 1;
		resetSelect("unite");
		resetSelect("ingredient");
	}
	
	function findIngredient(id_ingredient) {
		var ids = document.getElementById("ids").value;
		if (ids != "") {
			var pos = ids.indexOf(id_ingredient);
			if (pos != -1) {
				return pos;
			}
		}
		return false;
	}
	
	function supprimerIngredient(id_ingredient) {
		if (confirm("Êtes-vous sûr de vouloir supprimer cet ingrédient ?")) {
			document.getElementsByClassName(id_ingredient)[0].innerHTML = "";
			
			findIngredient(id_ingredient);
		}
	}
</script>

<div id="editer_recette">
	<h1>Editer une recette</h1>
	{if $erreur|default:''}<span class="erreur" >Erreur : certains champs sont invalides</span><br />{/if}
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
			{if $recette|default:''}
				<option value="facile" {if $recette['difficulte']=='facile'}selected{/if} >Facile</option>
				<option value="moyen" {if $recette['difficulte']=='moyen'}selected{/if} >Moyen</option>
				<option value="difficile" {if $recette['difficulte']=='difficile'}selected{/if} >Difficile</option>
				<option value="Tdifficile" {if $recette['difficulte']=='Tdifficile'}selected{/if} >Très difficile</option>
			{else}
				<option value="facile" >Facile</option>
				<option value="moyen" >Moyen</option>
				<option value="difficile" >Difficile</option>
				<option value="Tdifficile" >Très difficile</option>
			{/if}
			</select>
			<br />
			
		<fieldset style="text-align: center;">
			<legend>Ingrédients <span class="form_obligatoire" >*</span></legend>
			
			<input type="hidden" name="quantites"	{if $recette['quantites']|default:''}value="{$recette['quantites']}"{else}value=""{/if}>
			<input type="hidden" name="unites"		{if $recette['unites']|default:''}value="{$recette['unites']}"{else}value=""{/if}>
			<input type="hidden" name="ingredients"	{if $recette['ingredients']|default:''}value="{$recette['ingredients']}"{else}value=""{/if}>
			<input type="hidden" name="ids"	value="" >
			
			<div id="ingredients_ajoutes" class="table">
				<div class="trow">
					<span class="cell">Quantité</span>
					<span class="cell">Unité</span>
					<span class="cell">Ingrédient</span>
					<span class="cell">Action</span>
				</div>
				{if $recette['quantites']|default:''}
					{$qtts=explode(';',$recette['quantites'])}
					{$uns=explode(';',$recette['unites'])}
					{$ings=explode(';',$recette['ingredients'])}
					{$i=0}
					{foreach $qtts as $line}
						<div class="row">
							<span class="cell">{$qtts[$i]}</span>
							{foreach $unites as $line_unite}
								{if $line_unite->id_unite==$uns[$i]}
									<span class="cell">{$line_unite->nom_unite}</span>
									{break}
								{/if}
							{/foreach}
							{foreach $ingredients as $line_ingredient}
								{if $line_ingredient->id_ingredient==$ings[$i]}
									<span class="cell">{$line_ingredient->nom_ingredient}</span>
									{break}
								{/if}
							{/foreach}
							<span class="cell"><img src="{base_url('images/sup_ingredient.gif')}" title="Supprimer ingrédient" /></span>
							{$i=$i+1}
						</div>
						
					{/foreach}
				{/if}
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
			<textarea name="texte_recette" style="width: 700px; height: 200px;">{if $recette|default:''}{$recette['texte_recette']}{/if}</textarea>
		</fieldset>
		<br />
		
		Image de la recette :
			<input type="file" name="image_recette" />
			<br />
			
		<input type="submit" value="Sauvegarder" > <input type="reset">
	</form>
</div>
{/block}
