
{extends 'main.tpl'}
{block name="titre"}Connexion{/block}
{block name="output_area"}
<div id="body">
	<div id="page_connexion" >
		{if $erreur|default:''}<span style="color:red;">{$erreur}</span>{/if}
		<form action="" method="post">
		<fieldset id="formulaire_connexion">
			<legend>Connexion</legend>
			Login : <input type="text" name="login" {if $login|default:''}value="{$login}"{/if} ><br />
			Mot de passe : <input type="password" name="pwd" ><br />
			<input type="submit" name="form_log" value="Connexion">
		</fieldset>
		</form>
	</div>
</div>
{/block}
