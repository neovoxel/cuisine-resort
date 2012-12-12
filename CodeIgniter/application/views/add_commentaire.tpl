
{assign var='redirectTo' value=$redirectTo|default:''}
{assign var='id_recette' value=$id_recette|default:'0'}
<div id="add_com">
	<fieldset>
	<legend>Ajouter un commentaire</legend>
	{if $ci->_isLogOn()}
		<form action="{base_url('index.php/Membre/ajouterCommentaire')}" method="post"> <!-- {base_url('index.php/Membre/ajouterCommentaire')} -->
			<div id="add_com_form">
			<input type="hidden" name="id_recette" value="{$id_recette}">
			<input type="hidden" name="redirectTo" value="{$redirectTo}">
			<textarea name="commentaire" ></textarea><br />
			<input type="submit" name="form_com" value="Poster" >
			</div>
		</form>
	{else}
		Vous devez être connecté pour ajouter des commentaires.
		{include file='form_connexion.tpl' redirectTo=$redirectTo inline nocache}
	{/if}
	</fieldset>
</div>
