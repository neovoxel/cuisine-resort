<?php /* Smarty version Smarty-3.1.7, created on 2012-11-21 11:20:09
         compiled from "application/views\liste_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1018650abc9d0415277-23475837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dead604083d1112d3857b0042e654dc6a7deb78' => 
    array (
      0 => 'application/views\\liste_categories.tpl',
      1 => 1353492469,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1353492734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1018650abc9d0415277-23475837',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50abc9d05b5db',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50abc9d05b5db')) {function content_50abc9d05b5db($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Liste des catégories</title>
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
	
	<div id="contenu">
		
<div id="body">
<?php if ((($tmp = @$_smarty_tpl->tpl_vars['categories']->value)===null||$tmp==='' ? '' : $tmp)){?>
	<div id="liste_categories">
		<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
			<div class="categorie" >
				<a href="<?php echo base_url(('index.php/recettes/liste_recettes/').($_smarty_tpl->tpl_vars['line']->value->id_categorie));?>
"><img class="img_categorie" src="<?php echo base_url(('images/categories/').($_smarty_tpl->tpl_vars['line']->value->image_categorie));?>
" /></a>
				<h1><a href="<?php echo base_url(('index.php/recettes/liste_recettes/').($_smarty_tpl->tpl_vars['line']->value->id_categorie));?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value->nom_categorie;?>
</a></h1>
				<p>Il y a actuellement 0 recettes dans cette catégorie.<br />
				<a href="<?php echo base_url(('index.php/recettes/liste_recettes/').($_smarty_tpl->tpl_vars['line']->value->id_categorie));?>
" >Voir les recettes</a><br />
				<a href="index.php?page=ajouter_recette&idc=<?php echo $_smarty_tpl->tpl_vars['line']->value->id_categorie;?>
" >Ajouter une recette</a><p>
			</div>
		<?php } ?>
	</div>

<?php }else{ ?>
	<div>Erreur : $categories vide !</div>
<?php }?>
</div>

		
		<footer>
			<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

		</footer>
	</div> <!-- /contenu -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/bootstrap/js/vendor/jquery-1.8.2.min.js');?>
"><\/script>')</script>
	<script src="<?php echo base_url('assets/bootstrap/js/vendor/bootstrap.min.js');?>
"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/main.js');?>
"></script>
</body>
</html><?php }} ?>