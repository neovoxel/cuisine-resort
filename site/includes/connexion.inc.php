<?php
$login = "";

if (isset($_REQUEST['form_log'])) {
	$login = $_REQUEST['login'];
	
	if(isValidUser($login, $_REQUEST['pwd'])) {
		session_start();
		$_SESSION['id_user'] = $login;
		
		header('location: ./index.php?page=profil');
	}
	else
		$erreur_login = "Erreur d'authentification !";
}
?>

<div id="page_connexion" >
	<form action="" method="post">
	<fieldset id="formulaire_connexion">
		<legend>Connexion</legend>
		<?php if (isset($erreur_login)) echo '<span style="color:red;">'.$erreur_login.'</span><br />'; ?>
		Login : <input type="text" name="login" <?php if (isset($erreur_login)) echo "value=\"$login\""; ?> ><br />
		Mot de passe : <input type="password" name="pwd" ><br />
		<input type="submit" name="form_log" value="Connexion">
	</fieldset>
	</form>
</div>