<?php /* Smarty version Smarty-3.1.7, created on 2012-12-04 20:07:01
         compiled from "application/views\connexion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1227950ba343b64c895-39804166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b33fd3c77a1dc51e7aa472b8a5bdf6deaa14572' => 
    array (
      0 => 'application/views\\connexion.tpl',
      1 => 1354647116,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1354377331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1227950ba343b64c895-39804166',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50ba343b6fff2',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ba343b6fff2')) {function content_50ba343b6fff2($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Connexion</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>
">
	<style>
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
	</style>
	<script src="<?php echo base_url('assets/bootstrap/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js');?>
"></script>
</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	
	<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
	<div id="entete" >
		<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

	</div>
	
	<div id="navigation" >
		<?php echo $_smarty_tpl->getSubTemplate ('navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

	</div>
	
	<div id="contenu">
		
<div id="body">
	<div id="page_connexion" >
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp)){?><span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['erreur']->value;?>
</span><?php }?>
		<form action="" method="post">
		<fieldset id="formulaire_connexion">
			<legend>Connexion</legend>
			Login : <input type="text" name="login" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['login']->value)===null||$tmp==='' ? '' : $tmp)){?>value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
"<?php }?> ><br />
			Mot de passe : <input type="password" name="pwd" ><br />
			<input type="submit" name="form_log" value="Connexion">
		</fieldset>
		</form>
	</div>
</div>

		
		<footer>
			<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

		</footer>
	</div> <!-- /contenu -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</body>
</html><?php }} ?>