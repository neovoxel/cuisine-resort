
{assign var='id_recette' value=$id_recette|default:''}
{assign var='etat' value=$etat|default:''}
<fieldset class="info">
<legend>Information</legend>
	<div class="no_table">
	<div class="row">
		<div class="cell"><img src="{base_url('images/'|cat:$etat|cat:'.png')}" alt="{$etat}" title="{$etat}" height="24" width="24" /></div>
		<div class="cell">
		{if $etat=='private'}
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
			function changerEtatAJAX(id_recette) {
				var xhr_object = getXMLHTTP();
				xhr_object.onreadystatechange = function() {
					if (xhr_object.readyState == 4) {
						if (xhr_object.status == 200) {
							if (xhr_object.responseText.search("ok") >= 0)
								alert("Votre demande a bien été prise en compte.");
							else
								alert("Une erreur est survenue lors du changement d'état de la recette.");
						}
					}
				};
				
				xhr_object.open("POST", "{base_url('index.php/Admin/changerEtatRecette')}", true);
				xhr_object.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr_object.send("id_recette=" + id_recette + "&etat=waiting");
			}
			</script>
			Votre recette est actuellement privée et n'est visible que par vous.<br />
			<a href="javascript:changerEtatAJAX({$id_recette})">Cliquez ici</a> pour effectuer une demande de validation auprès d'un administrateur.
		{elseif $etat=='waiting'}
			Votre recette est en cours de validation par un administrateur. Vous serez notifié(e) par mail lors de sa publication.<br />
			Toute modification de votre recette la rendra de nouveau privée et vous devrez refaire une demande de validation auprès d'un administrateur pour la rendre publique.
		{elseif $etat=='public'}
			Votre recette est actuellement publique et visible par tout le monde.<br />
			Toute modification de celle-ci la rendra de nouveau privée et vous devrez refaire une demande de validation auprès d'un administrateur pour la rendre publique.
		{/if}
		</div>
	</div>
	</div>
</fieldset>
