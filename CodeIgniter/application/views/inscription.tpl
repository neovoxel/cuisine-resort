{extends 'main.tpl'}
{block name="titre"}Inscription{/block}
{block name="output_area"}
<div id="body">
	{if !$ok|default:false}
	<form action="{base_url('index.php/home/inscription')}" method="post">
	{if $erreur|default:''}<span style="color:red;">{$erreur}</span>{/if}
	<fieldset id="formulaire_inscription">
		<label>Votre login: </label><input name="login" type="text" size="25" value="{if $login|default:''}{$login}{/if}"><br />
		<label>Votre mot de passe: </label><input name="password" type="password"><br />
		<label>Confirmer le mot de passe: </label><input name="passok" type="password"><br />
		<hr/>
		<label>Votre nom: </label><input name="nom" type="text" size="25" value="{if $nom|default:''}{$nom}{/if}"><br /></label>
		<label>Votre prenom: </label><input name="prenom" type="text" size="25" value="{if $prenom|default:''}{$prenom}{/if}"><br /></label>
		<label>Votre email: </label><input name="email" type="text" size="25" value="{if $email|default:''}{$email}{/if}"><br />
		<label>Confirmer l'email: </label><input name="emailok" type="text" size="25" value="">
		<hr/>
		<input type="submit" name="form_log" value="S'inscrire">
	</fieldset>
	</form>
	{else}
	Inscription terminée. Bienvenue sur notre site cher {$login} !
	{/if}
</div>
{/block}
