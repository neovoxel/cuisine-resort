
{assign var='redirectTo' value=$redirectTo|default:''}
<div id="form_connexion" >
	{if $erreur|default:''}<span class="erreur">{$erreur}</span>{/if}
	<form action="{base_url('index.php/home/connexion')}" method="post">
	<fieldset id="formulaire_connexion">
		<legend>Connexion</legend>
		<input type="hidden" name="redirectTo" value="{$redirectTo}">
		<label>Login</label> <input type="text" name="login" {if $login|default:''}value="{$login}"{/if} ><br />
		<label>Mot de passe</label> <input type="password" name="pwd" ><br />
		<input type="submit" name="form_log" value="Connexion">
	</fieldset>
	</form>
</div>
