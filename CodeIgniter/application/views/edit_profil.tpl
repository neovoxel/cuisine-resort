{extends 'main.tpl'}
{block name="titre"}Inscription{/block}
{block name="output_area"}
<div id="edit_profil">
	<form action="{base_url('index.php/membre/edit')}" method="post">
	{if $erreur|default:''}<span style="color:red;">{$erreur}</span>{/if}
	<h2> Edition du profil</h2>
	<fieldset id="edition_profil">
		<label>Votre nom: </label><input name="nom" type="text" size="25" value="{$utilisateur->nom_utilisateur}"><br /></label>
		<label>Votre prenom: </label><input name="prenom" type="text" size="25" value="{$utilisateur->prenom}"><br /></label>
		<label>Votre email: </label><input name="email" type="text" size="25" value="{$utilisateur->email}"><br />
		<label>Confirmer l'email: </label><input name="emailok" type="text" size="25" value="">
		<hr />
		<label>Votre mot de passe: </label><input name="password" type="password"><br />
		<label>Confirmer le mot de passe: </label><input name="passok" type="password"><br />

		<input type="submit" name="form_log" value="Confirmer">
	</fieldset>
	</form>
</div>
{/block}
