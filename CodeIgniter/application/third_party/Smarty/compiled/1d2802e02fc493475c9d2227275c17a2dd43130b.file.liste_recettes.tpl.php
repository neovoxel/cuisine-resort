<?php /* Smarty version Smarty-3.1.7, created on 2012-11-20 19:09:47
         compiled from "application/views\liste_recettes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48150abc71be56e70-63927668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d2802e02fc493475c9d2227275c17a2dd43130b' => 
    array (
      0 => 'application/views\\liste_recettes.tpl',
      1 => 1353434984,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1353354464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48150abc71be56e70-63927668',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50abc71c0f75a',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50abc71c0f75a')) {function content_50abc71c0f75a($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>
">
	<link rel="stylesheet" href="<?php echo base_url('assets/FortAwesome/css/font-awesome.css');?>
">
	<style>
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
	</style>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap-responsive.min.css');?>
">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.css');?>
">
	<script src="<?php echo base_url('assets/bootstrap/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js');?>
"></script>
</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	
	<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
	<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

	
	<div class="container">
		<h1>Liste des recettes</h1>
		
<div id="body">
<?php if ((($tmp = @$_smarty_tpl->tpl_vars['recettes']->value)===null||$tmp==='' ? '' : $tmp)){?>
	<div id="contenu">
	<div id="categorie_selection">
		<img class="img_categorie" src="<?php echo base_url(('images/categories/').($_smarty_tpl->tpl_vars['categorie']->value->image_categorie));?>
" />
		<h1><?php echo $_smarty_tpl->tpl_vars['categorie']->value->nom_categorie;?>
</h1>
	</div>
	<div id="liste_recettes">
		<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recettes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
			<div class="recette">
				<p><a href="<?php echo base_url(('index.php/recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
"><img class="img_recette" src="images/default/recette.png" alt="Illustration recette" height="150" width="150" /></a></p>
				<h3><a href="<?php echo base_url(('index.php/recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
"> <?php echo $_smarty_tpl->tpl_vars['line']->value->titre;?>
</a></h3>
				<h4>Le <?php echo $_smarty_tpl->tpl_vars['line']->value->date_recette;?>
 par <a href="<?php echo base_url(('index.php/utilisateur/liste_categories/').($_smarty_tpl->tpl_vars['line']->value->id_categorie));?>
">$nom_utilisateur</a></h4>
				<p class="texte_recette">$texte_recette <a href="<?php echo base_url(('index.php/recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
"> Lire la suite</a></p>
				<p><a href="<?php echo base_url(('index.php/recettes/liste_categories/').($_smarty_tpl->tpl_vars['line']->value->id_categorie));?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value->id_categorie;?>
</a></p>
			</div>
		<?php } ?>
	</div>
	</div>

<?php }else{ ?>
	<div>Erreur : $recettes vide !</div>
<?php }?>
</div>

		
		<footer>
			<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

		</footer>
	</div> <!-- /container -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/bootstrap/js/vendor/jquery-1.8.2.min.js');?>
"><\/script>')</script>
	<script src="<?php echo base_url('assets/bootstrap/js/vendor/bootstrap.min.js');?>
"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/main.js');?>
"></script>
</body>
</html><?php }} ?>