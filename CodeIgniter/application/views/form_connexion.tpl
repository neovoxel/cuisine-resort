
{assign var='redirectTo' value=$redirectTo|default:''}
<div id="form_connexion" >
	{if $erreur|default:''}<span style="color:red;">{$erreur}</span>{/if}
	<form action="{base_url('index.php/home/connexion')}" method="post">
	<fieldset id="formulaire_connexion">
		<legend>Connexion</legend>
		<input type="hidden" name="redirectTo" value="{$redirectTo}">
		Login : <input type="text" name="login" {if $login|default:''}value="{$login}"{/if} ><br />
		Mot de passe : <input type="password" name="pwd" ><br />
		<input type="submit" name="form_log" value="Connexion">
	</fieldset>
	</form>
</div>
