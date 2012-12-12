{extends 'main.tpl'}
{block name="titre"}Inscription{/block}
{block name="output_area"}
<div id="body">
	<form action="{base_url('index.php/home/inscription')}" method="post">
	{if $erreur|default:''}<span style="color:red;">{$erreur}</span>{/if}
	<fieldset id="formulaire_inscription">
		Votre login: <input name="login" type="text" size="25" value="{if $login|default:''}{$login}{/if}"><br />
		Votre mot de passe: <input name="password" type="password"><br />
		Confirmer le mot de passe: <input name="passok" type="password">
		<hr/>
		Votre nom: <input name="nom" type="text" size="25" value="{if $nom|default:''}{$nom}{/if}"><br />
		Votre prenom: <input name="prenom" type="text" size="25" value="{if $prenom|default:''}{$prenom}{/if}"><br />
		Votre email: <input name="email" type="text" size="25" value="{if $email|default:''}{$email}{/if}">
		<hr/>
		<input type="submit" name="form_log" value="S'inscrire">
	</fieldset>
	</form>
</div>
{/block}
