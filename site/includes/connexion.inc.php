<?php
$login = "";

if (isset($_POST['form_log'])) {
	$login = $_POST['login'];
	
	if(isValidUser($login, $_POST['pwd'])) {
		$request_utilisateur = <<< EOF
		SELECT *
		FROM utilisateur
		WHERE login='$login';
EOF;
		$result_utilisateur = my_request($request_utilisateur);
		
		if ($result_utilisateur !== false) {
			$result_utilisateur = $result_utilisateur[0];
			session_start();
			$_SESSION['id_utilisateur'] = $result_utilisateur['id_utilisateur'];
			$_SESSION['login_utilisateur'] = $result_utilisateur['login'];
			header('location: ./index.php?page=profil');
		}
		else
			$erreur_login = "Erreur d'authentification !";
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