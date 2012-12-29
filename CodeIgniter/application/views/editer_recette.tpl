
{extends 'main.tpl'}
{block name="titre"}{if $recette['id_recette']|default:''}Editer{else}Ajouter{/if} une recette{/block}
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
	
	function setSelected(selectId, index) {
		var selectElmt = document.getElementById(selectId);
		selectElmt.options[selectElmt.selectedIndex].selected = false;
		selectElmt.options[index].selected = true;
	}
	
	function getSelectIndexFromValue(selectId, value) {
		var select = document.getElementById(selectId);
		
		for (var i = 0 ; i < select.options.length ; i++) {
			if (select.options[i].value == value)
				return i;
		}
		return -1;
	}
	
	function appendValue(element, value) {
		if (document.getElementsByName(element)[0].value != "")
			document.getElementsByName(element)[0].value += ";" + value;
		else
			document.getElementsByName(element)[0].value = value;
	}
	
	function mClone(original, copie) {
		var source = document.getElementById(original);
		var destination = document.getElementById(copie);
		destination.appendChild(source.cloneNode(true));
	}
	
	function generateCell(content) {
		return '<span class="cell">' + content	+ "</span>";
	}
	
	function generateRow(quantite, unite, ingredient, actions) {
		var text  = generateCell(quantite);
			text += generateCell(unite);
			text += generateCell(ingredient);
			text += generateCell(actions);
		return text;
	}
	
	function generateActions(id_ingredient) {
		var supprimer = '<a href="javascript:supprimerIngredient(\'' + id_ingredient + '\')" ><img src="{base_url('images/sup_ingredient.gif')}" alt="Supprimer ingrédient" title="Supprimer ingrédient" /></a>';
		var modifier = '<a href="javascript:modifierIngredient(\'' + id_ingredient + '\')" ><img src="{base_url('images/edit_ingredient.png')}" alt="Modifier ingrédient" title="Modifier ingrédient" /></a>';
		var appliquer = '<a href="javascript:appliquerModification(\'' + id_ingredient + '\')" ><img src="{base_url('images/ok.png')}" alt="Appliquer modifications" title="Appliquer modifications" /></a>';
		var annuler = '<a href="javascript:annulerModification(\'' + id_ingredient + '\')" ><img src="{base_url('images/annuler.png')}" alt="Annuler modifications" title="Annuler modifications" /></a>';
		var actions = { "supprimer" : supprimer, "modifier" : modifier, "appliquer" : appliquer, "annuler" : annuler };
		return actions;
	}
	
	function ajouterIngredient() {
		if (document.getElementById("quantite").value <= 0 || getSelectValue("unite") == 0 || getSelectValue("ingredient") == 0)
			return alert("Erreur : Quantité / Unité / Ingrédient invalide");
		
		var quantite = document.getElementById("quantite").value;
		var unite = getSelectText("unite");
		var ingredient = getSelectText("ingredient");
		var id_ingredient = quantite + "_" + getSelectValue("unite") + "_" + getSelectValue("ingredient") + "_" + Math.round(Math.random()*100000);
		var actions = generateActions(id_ingredient);
		actions = actions["modifier"] + " " + actions["supprimer"];
		
		var text  = '<div id="' + id_ingredient + '" class="row" >';
			text += generateRow(quantite, unite, ingredient, actions);
			text += "</div>";
		document.getElementById("ingredients_ajoutes").innerHTML += text;
		
		appendValue("quantites", quantite);
		appendValue("unites", getSelectValue("unite"));
		appendValue("ingredients", getSelectValue("ingredient"));
		appendValue("uniqueIDs", id_ingredient);
		
		document.getElementById("quantite").value = 1;
		setSelected("unite", 0);
		setSelected("ingredient", 0);
	}
	
	function findAndDelete(tab) {
		var quantites = document.getElementsByName("quantites")[0].value;
		quantites = quantites.split(";");
		
		var unites = document.getElementsByName("unites")[0].value;
		unites = unites.split(";");
		
		var ingredients = document.getElementsByName("ingredients")[0].value;
		ingredients = ingredients.split(";");
		
		var uniqueIDs = document.getElementsByName("uniqueIDs")[0].value;
		uniqueIDs = uniqueIDs.split(";");
		
		for (var i = 0 ; i < quantites.length ; i++) {
			if (quantites[i] == tab[0] && unites[i] == tab[1] && ingredients[i] == tab[2] && uniqueIDs[i] == tab[3]) {
				var str_quantites	= "";
				var str_unites		= "";
				var str_ingredients	= "";
				var str_uniqueIDs	= "";
				
				if (i == 0) {
					for (var j = 1 ; j < quantites.length ; j++) {
						str_quantites	+= quantites[j] + ";";
						str_unites		+= unites[j] + ";";
						str_ingredients	+= ingredients[j] + ";";
						str_uniqueIDs	+= uniqueIDs[j] + ";";
					}
					
					str_quantites	= str_quantites.substring(0, str_quantites.length-1);
					str_unites		= str_unites.substring(0, str_unites.length-1);
					str_ingredients	= str_ingredients.substring(0, str_ingredients.length-1);
					str_uniqueIDs	= str_uniqueIDs.substring(0, str_uniqueIDs.length-1);
				}
				else {
					str_quantites	= quantites[0];
					str_unites		= unites[0];
					str_ingredients	= ingredients[0];
					str_uniqueIDs	= uniqueIDs[0];
					
					for (var j = 1 ; j < quantites.length ; j++) {
						if (i != j) {
							str_quantites	+= ";" + quantites[j];
							str_unites		+= ";" + unites[j];
							str_ingredients	+= ";" + ingredients[j];
							str_uniqueIDs	+= ";" + uniqueIDs[j];
						}
					}
				}
				
				document.getElementsByName("quantites")[0].value	= str_quantites;
				document.getElementsByName("unites")[0].value		= str_unites;
				document.getElementsByName("ingredients")[0].value	= str_ingredients;
				document.getElementsByName("uniqueIDs")[0].value	= str_uniqueIDs;
				
				return true;
			}
		}
		return false;
	}
	
	function supprimerIngredient(id_ingredient) {
		if (confirm("Êtes-vous sûr de vouloir supprimer cet ingrédient ?")) {
			var tab = id_ingredient.split("_");
			tab[3] = id_ingredient;
			if (!findAndDelete(tab))
				alert("Erreur lors de la suppression de l'ingrédient.");
			else {
				var parent = document.getElementById("ingredients_ajoutes");
				var element = document.getElementById(id_ingredient);
				parent.removeChild(element);
			}
		}
	}
	
	function modifierIngredient(id_ingredient) {
		var tab = id_ingredient.split("_");
		tab[3] = id_ingredient;
		
		var actions = generateActions(id_ingredient);
		actions = actions["appliquer"] + " " + actions["annuler"];
		
		var text  = generateCell('<input id="quantite_' + id_ingredient + '" type="number" size="2" value="' + tab[0] + '" >');
			text += '<span class="cell" id="unite_' + id_ingredient + '"></span>';
			text += '<span class="cell" id="ingredient_' + id_ingredient + '"></span>';
			text += generateCell(actions);
		
		var element = document.getElementById(id_ingredient);
		element.innerHTML = text;
		
		mClone("unite", "unite_" + id_ingredient);
		document.getElementById("unite_" + id_ingredient).childNodes[0].id = "select_unite_" + id_ingredient;
		setSelected("select_unite_" + id_ingredient, getSelectIndexFromValue("unite", tab[1]));
		
		mClone("ingredient", "ingredient_" + id_ingredient);
		document.getElementById("ingredient_" + id_ingredient).childNodes[0].id = "select_ingredient_" + id_ingredient;
		setSelected("select_ingredient_" + id_ingredient, getSelectIndexFromValue("ingredient", tab[2]));
	}
	
	function appliquerModification(id_ingredient) {
		var tab = id_ingredient.split("_");
		tab[3] = id_ingredient;
		if (!findAndDelete(tab))
			alert("Erreur lors de la modification de l'ingrédient.");
		else {
			var quantite = document.getElementById("quantite_" + id_ingredient).value;
			var unite = getSelectText("select_unite_" + id_ingredient);
			var ingredient = getSelectText("select_ingredient_" + id_ingredient);
			var new_id_ingredient = quantite + "_" + getSelectValue("select_unite_" + id_ingredient) + "_" + getSelectValue("select_ingredient_" + id_ingredient) + "_" + Math.round(Math.random()*100000);
			var actions = generateActions(id_ingredient);
			actions = actions["modifier"] + " " + actions["supprimer"];
		
			appendValue("quantites", quantite);
			appendValue("unites", getSelectValue("select_unite_" + id_ingredient));
			appendValue("ingredients", getSelectValue("select_ingredient_" + id_ingredient));
			appendValue("uniqueIDs", new_id_ingredient);
			
			var element = document.getElementById(id_ingredient);
			element.innerHTML = generateRow(quantite, unite, ingredient, actions);
			element.id = new_id_ingredient;
		}
	}
	
	function annulerModification(id_ingredient) {
		var tab = id_ingredient.split("_");
		tab[3] = id_ingredient;
		
		var quantite = tab[0];
		var unite = document.getElementById("unite").options[getSelectIndexFromValue("unite", tab[1])].text;
		var ingredient = document.getElementById("ingredient").options[getSelectIndexFromValue("ingredient", tab[2])].text;
		var actions = generateActions(id_ingredient);
		actions = actions["modifier"] + " " + actions["supprimer"];
		
		document.getElementById(id_ingredient).innerHTML = generateRow(quantite, unite, ingredient, actions);
	}
	
</script>

<div id="editer_recette">
	{if $recette['image_recette']|default:''}
		<img class="img_recette" src="{base_url('images/'|cat:$recette['login']|cat:'/'|cat:$recette['id_recette']|cat:'/'|cat:$recette['image_recette'])}" alt="Illustration recette" height="300" width="300" />
	{elseif $recette['id_recette']|default:''}
		<img class="img_recette" src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="300" width="300" />
	{/if}
	<h1>{if $recette['id_recette']|default:''}Editer{else}Ajouter{/if} une recette</h1>
	{if $recette['etat']|default:''}
		{if $recette['etat']=='private'}
			<p>Votre recette est actuellement privée et n'est visible que par vous.<br />
			<a>Cliquez ici</a> pour effectuer une demande de validation auprès d'un administrateur.</p>
		{elseif $recette['etat']=='waiting'}
			<p>Votre recette est en cours de validation par un administrateur. Vous serez notifié(e) par mail lors de sa publication.<br />
			Toute modification de votre recette la rendra de nouveau privée et vous devrez refaire une demande de validation auprès d'un administrateur pour la rendre publique.</p>
		{elseif $recette['etat']=='public'}
			<p>Votre recette est actuellement publique et visible par tout le monde.<br />
			Toute modification de celle-ci la rendra de nouveau privée et vous devrez refaire une demande de validation auprès d'un administrateur pour la rendre publique.</p>
		{/if}
	{/if}
	
	{if $erreur|default:''}<span class="erreur" >Erreur : certains champs sont invalides</span><br />{/if}
	<form enctype="multipart/form-data" method="post">
		<p><span class="form_obligatoire" >*</span> Champs obligatoires</p>
		<fieldset>
			<legend>Informations</legend>
			{if $recette['id_recette']|default:''}<input type="hidden" name="id_recette" value="{$recette['id_recette']}" >{/if}
			<label>Titre de la recette <span class="form_obligatoire" >*</span></label>
				<input name="titre" type="text" size="25" {if $recette|default:''}value="{$recette['titre']}"{else}value="Titre de la recette"{/if}>
				<br />
				
			{if $recette['date_recette']|default:''}
				<label>Date de création</label> {$recette['date_recette']}
				<br />
			{/if}
			
			<label>Catégorie(s) <span class="form_obligatoire" >*</span></label>
				{foreach $categories as $line}
					<input type="checkbox" value="{$line->id_categorie}" name="categorie_{$line->id_categorie}" {if $recette['categorie_'|cat:$line->id_categorie]|default:''}checked="checked"{/if}>{$line->nom_categorie}
				{/foreach}
				<br />
				
			<label>Nombre de personnes</label>
				<input name="nb_pers" type="number" size="2" {if $recette|default:''}value="{$recette['nb_pers']}"{else}value="1"{/if} >
				<br />
				
			<label>Temps de préparation</label>
				<input name="tps_h" type="number" size="2" {if $recette|default:''}value="{$recette['tps_h']}">{else}value="1">{/if} heures
				<input name="tps_m" type="number" size="2" {if $recette|default:''}value="{$recette['tps_m']}">{else}value="0">{/if} minutes
				<input name="tps_s" type="number" size="2" {if $recette|default:''}value="{$recette['tps_s']}">{else}value="0">{/if} secondes
				<br />
				
			<label>Difficulté</label>
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
				
		</fieldset>
		<br />
		
		<fieldset style="text-align: center;">
			<legend>Ingrédients <span class="form_obligatoire" >*</span></legend>
			
			<input type="hidden" name="quantites"	{if $recette['quantites']|default:''}value="{$recette['quantites']}"{else}value=""{/if}>
			<input type="hidden" name="unites"		{if $recette['unites']|default:''}value="{$recette['unites']}"{else}value=""{/if}>
			<input type="hidden" name="ingredients"	{if $recette['ingredients']|default:''}value="{$recette['ingredients']}"{else}value=""{/if}>
			<input type="hidden" name="uniqueIDs"	{if $recette['uniqueIDs']|default:''}value="{$recette['uniqueIDs']}"{else}value=""{/if}>
			
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
					{$ids=explode(';',$recette['uniqueIDs'])}
					{$i=0}
					{foreach $qtts as $line}
						<div id="{$ids[$i]}" class="row" >
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
							<span class="cell">
								<a href="javascript:modifierIngredient('{$ids[$i]}')" ><img src="{base_url('images/edit_ingredient.png')}" alt="Modifier ingrédient" title="Modifier ingrédient" /></a>
								<a href="javascript:supprimerIngredient('{$ids[$i]}')" ><img src="{base_url('images/sup_ingredient.gif')}" alt="Supprimer ingrédient" title="Supprimer ingrédient" /></a>
							</span>
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
			<legend>Préparation de la recette <span class="form_obligatoire" >*</span></legend>
			<textarea name="texte_recette" style="width: 700px; height: 200px;">{if $recette|default:''}{$recette['texte_recette']}{/if}</textarea>
		</fieldset>
		<br />
		
		<label>Image de la recette</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<input type="file" name="userfile" /> (.gif .jpg .png)
			<br />
			<span style="color: orange; text-decoration: underline;">Attention :</span> L'image ne doit pas dépasser la taille de 300 x 300 pixels et ne doit pas peser plus de 1Mo.<br />
			<br />
		<input type="submit" value="Sauvegarder" > <input type="reset">
	</form>
</div>
{/block}
