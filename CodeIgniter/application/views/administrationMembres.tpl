
{extends 'main.tpl'}
{block name="titre"}Administration des membres{/block}
{block name="scripts_area"}
<script type="text/javascript" >
	function delete_membre()
	{ return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?"); }
	
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
	
	function changerTypeUtilisateurAJAX(id_utilisateur, type) {
		var xhr_object = getXMLHTTP();
		xhr_object.onreadystatechange = function() {
			if (xhr_object.readyState == 4) {
				if (xhr_object.status == 200) {
					if (xhr_object.responseText.search("ok") >= 0)
						alert("Changement réussi.");
					else {
						var select = document.getElementById("select_" + id_utilisateur);
						if (select.selectedIndex == 0)
							select.options[1].selected = true;
						else
							select.options[0].selected = true;
						alert("Une erreur est survenue lors du changement de type de l'utilisateur.\n'" + xhr_object.responseText + "'");
					}
				}
			}
		};
		
		xhr_object.open("POST", "{base_url('index.php/Admin/changerTypeUtilisateur')}", true);
		xhr_object.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		xhr_object.send("id_utilisateur=" + id_utilisateur + "&type=" + type);
	}
	
	function changerTypeUtilisateur(id_utilisateur) {
		var select = document.getElementById("select_" + id_utilisateur);
		
		if (confirm("Êtes-vous sûr de vouloir changer le type de cet utilisateur ?"))
			changerTypeUtilisateurAJAX(id_utilisateur, select.selectedIndex);
		else {
			if (select.selectedIndex == 0)
				select.options[1].selected = true;
			else
				select.options[0].selected = true;
		}
	}
</script>
{/block}
{block name="output_area"}
<div id="administration">
<h1>Administration des membres</h1>
	<div class="table">
		<div class="trow">
			<div class="cell">Pseudonyme</div>
			<div class="cell">Nom</div>
			<div class="cell">Prénom</div>
			<div class="cell">Date d'inscription</div>
			<div class="cell">E-mail</div>
			<div class="cell">Type</div>
			<div class="cell">Action</div>
		</div>
		{foreach $membres as $membre}
			<div class="row">
				<div class="cell"><a href="{base_url('index.php/home/profil/'|cat:{$membre->id_utilisateur})}">{$membre->login}</a></div>
				<div class="cell">{$membre->nom_utilisateur}</div>
				<div class="cell">{$membre->prenom}</div>
				<div class="cell">00-00-0000</div>
				<div class="cell"><a href="mailto:{$membre->email}">{$membre->email}</a></div>
				<div class="cell">
					<select id="select_{$membre->id_utilisateur}" onchange="javascript:changerTypeUtilisateur({$membre->id_utilisateur});">
						<option value="0">Membre</option>
						<option value="1" {if $membre->type_utilisateur==1}selected{/if}>Administrateur</option>
					</select>
				</div>
				<div class="cell">
					<form class="img_edit_recette" action="{base_url('index.php/Admin/supprimerUtilisateur')}" method="post" >
						<input type="hidden" name="id_utilisateur" value="{$membre->id_utilisateur}">
						<input border=0 src="{base_url('images/sup_recette.png')}" type=image align="middle" name="form_supp_utilisateur" value="submit" onclick="javascript:return delete_membre()" >
					</form>
				</div>
				
			</div>
		{/foreach}
	</div>
</div>
{/block}
