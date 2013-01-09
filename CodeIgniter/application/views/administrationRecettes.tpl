
{extends 'main.tpl'}
{block name="titre"}Welcome{/block}
{block name="scripts_area"}
<script type="text/javascript" >
	function getXMLHTTP() {
		var xhr;
		try { xhr = new XMLHttpRequest(); }
		catch (e) {
			try { xhr = new ActiveXObject('Msxml2.XMLHTTP'); }
			catch (e2) {
				try { xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
				catch (e3) { xhr = false; }
			}
		}
		return xhr;
	}
	function changerEtatAJAX(id_recette, etat) {
		var xhr_object = getXMLHTTP();
		xhr_object.onreadystatechange = function() {
			if (xhr_object.readyState == 4) {
				if (xhr_object.status == 200) {
					if (xhr_object.responseText.search("ok") >= 0)
						annuler(id_recette, etat);
					else
						alert("Une erreur est survenue lors du changement d'état de la recette.");
				}
			}
			
		};
		
		xhr_object.open("POST", "{base_url('index.php/Admin/changerEtatRecette')}", true);
		xhr_object.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		xhr_object.send("id_recette=" + id_recette + "&etat=" + etat);
	}
	
	function delete_recette()
	{ return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?'); }

	function createOption(value, _text) {
		var element = document.createElement("option");
		element.setAttribute('value', value);
		var text = document.createTextNode(_text);
		element.appendChild(text);
		return element;
	}
	
	function createSelect(id_select, etat) {
		var select = document.createElement('select');
		select.setAttribute('id', id_select);
		select.appendChild(createOption('public', 'Publique'));
		select.appendChild(createOption('waiting', 'En attente'));
		select.appendChild(createOption('private', 'Privée'));
		
		if (etat == 'public')
			select.options[0].selected = true;
		else if (etat == 'waiting')
			select.options[1].selected = true;
		else
			select.options[2].selected = true;
		
		return select;
	}
	
	function valider(id_recette) {
		if (confirm('Êtes-vous sûr de vouloir changer l\'état de cette recette ?')) {
			var select = document.getElementById('select_etat_' + id_recette);
			var etat = select.options[select.selectedIndex].value;
			changerEtatAJAX(id_recette, etat);
		}
	}
	
	function annuler(id_recette, etat) {
		var str = '<a href="javascript:changerEtat(' + id_recette + "','" + etat + '\')" >';
		str += '<img src="{base_url('images/')}/' + etat + '.png" alt="' + etat + '" title="' + etat + '" height="24" width="24" /></a>';
		document.getElementById("etat_" + id_recette).innerHTML = str;
	}
	
	function changerEtat(id_recette, etat) {
		document.getElementById("etat_" + id_recette).innerHTML = '';
		document.getElementById("etat_" + id_recette).appendChild(createSelect('select_etat_' + id_recette, etat));
		var valider = '<a href="javascript:valider(\'' + id_recette + '\')" ><img src="{base_url('images/ok.png')}" alt="Valider" title="Valider" /></a>';
		var annuler = '<a href="javascript:annuler(\'' + id_recette + "','" + etat + '\')" ><img src="{base_url('images/annuler.png')}" alt="Annuler" title="Annuler" /></a>';
		document.getElementById("etat_" + id_recette).innerHTML += '<br />' + valider + annuler;
	}
</script>
{/block}
{block name="output_area"}
<div id="body">
<h1>Administration des recettes</h1>
	<div class="table">
		<div class="trow">
			<div class="cell">Image</div>
			<div class="cell">Titre</div>
			<div class="cell">Auteur</div>
			<div class="cell">Date</div>
			<div class="cell">Catégories</div>
			<div class="cell">Etat</div>
			<div class="cell">Action</div>
		</div>
		{foreach $recettes as $recette}
			<div class="row">
				<div class="cell">
					{if is_null($recette->image_recette)}
						<img src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="50" width="50" />
					{else}
						<img src="{base_url('images/'|cat:$recette->login|cat:'/'|cat:$recette->id_recette|cat:'/'|cat:$recette->image_recette)}" alt="Illustration recette" height="50" width="50" />
					{/if}
				</div>
				<div class="cell"><a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}">{$recette->titre}</a></div>
				<div class="cell"><a href="{base_url('index.php/home/profil/'|cat:$recette->id_utilisateur)}">{$recette->login}</a></div>
				<div class="cell">{$recette->date_recette}</div>
				<div class="cell">
					{foreach $recette->liste_categories as $categorie_recette}
						<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
					{/foreach}
				</div>
				<div id="etat_{$recette->id_recette}" class="cell">
					<a href="javascript:changerEtat({$recette->id_recette},'{$recette->etat}')" >
						<img src="{base_url('images/'|cat:$recette->etat|cat:'.png')}" alt="{$recette->etat}" title="{$recette->etat}" height="24" width="24" />
					</a>
				</div>
				<div class="cell">
					<form class="img_edit_recette" action="{base_url('index.php/Admin/supprimerRecette')}" method="post" >
						<input type="hidden" name="id_recette" value="{$recette->id_recette}">
						<input border=0 src="{base_url('images/sup_recette.png')}" type=image align="middle" name="form_supp_recette" value="submit" onclick="javascript:return delete_recette()" >
					</form>
					<form class="img_edit_recette" action="{base_url('index.php/Admin/editerRecette/'|cat:$recette->id_recette)}" method="post" >
						<input type="hidden" name="id_recette" value="{$recette->id_recette}">
						<input border=0 src="{base_url('images/edit_recette.gif')}" type=image align="middle" name="form_edit_recette" value="submit" >
					</form>
				</div>
			</div>
		{/foreach}
	</div>
</div>
{/block}
