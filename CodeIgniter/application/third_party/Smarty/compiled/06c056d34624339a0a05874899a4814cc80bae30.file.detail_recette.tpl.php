<?php /* Smarty version Smarty-3.1.7, created on 2012-12-01 17:49:06
         compiled from "application/views\detail_recette.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1351350ba35020be935-18168721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c056d34624339a0a05874899a4814cc80bae30' => 
    array (
      0 => 'application/views\\detail_recette.tpl',
      1 => 1354376715,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1354377331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1351350ba35020be935-18168721',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50ba3502398b1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ba3502398b1')) {function content_50ba3502398b1($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Détail recette</title>
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
<?php if ((($tmp = @$_smarty_tpl->tpl_vars['recette']->value)===null||$tmp==='' ? '' : $tmp)){?>
<div id="detail_recette">
		<div id="presentation">
			<?php if (is_null($_smarty_tpl->tpl_vars['recette']->value->image_recette)){?>
				<img class="img_recette" src="<?php echo base_url('images/default/recette.png');?>
" alt="Illustration recette" height="300" width="300" />
			<?php }else{ ?>
				<img class="img_recette" src="<?php echo base_url(((((('images/').($_smarty_tpl->tpl_vars['utilisateur']->value->login)).('/')).($_smarty_tpl->tpl_vars['recette']->value->titre)).('/')).($_smarty_tpl->tpl_vars['recette']->value->image_recette));?>
" alt="Illustration recette" height="300" width="300" />
			<?php }?>
			
			<h1><?php echo $_smarty_tpl->tpl_vars['recette']->value->titre;?>
</h1>
			<ul>
				<li>Catégories :
					<?php  $_smarty_tpl->tpl_vars['categorie_recette'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categorie_recette']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recette']->value->liste_categories; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categorie_recette']->key => $_smarty_tpl->tpl_vars['categorie_recette']->value){
$_smarty_tpl->tpl_vars['categorie_recette']->_loop = true;
?>
						<a href="<?php echo base_url(('index.php/Recettes/liste_recettes/').($_smarty_tpl->tpl_vars['categorie_recette']->value->id_categorie));?>
"><?php echo $_smarty_tpl->tpl_vars['categorie_recette']->value->nom_categorie;?>
</a>
					<?php } ?></li>
				<li>Préparation : <?php echo $_smarty_tpl->tpl_vars['recette']->value->temps_prepar;?>
</li>
				<li>Difficulté : <?php echo $_smarty_tpl->tpl_vars['recette']->value->difficulte;?>
</li>
				<li>Nombre de personnes : <?php echo $_smarty_tpl->tpl_vars['recette']->value->nb_pers;?>
</li>
			</ul>
			<p class="auteur_recette">Recette proposée le <?php echo $_smarty_tpl->tpl_vars['recette']->value->date_recette;?>
 par <a href="<?php echo base_url(('index.php/home/profil/').($_smarty_tpl->tpl_vars['utilisateur']->value->id_utilisateur));?>
"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</a></p>
			<hr />
		</div>
		<div id="ingredients">
			<h2>Ingrédients :</h2>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['ingredient'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ingredient']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ingredients']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ingredient']->key => $_smarty_tpl->tpl_vars['ingredient']->value){
$_smarty_tpl->tpl_vars['ingredient']->_loop = true;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['ingredient']->value->quantite;?>
 <?php echo $_smarty_tpl->tpl_vars['ingredient']->value->nom_unite;?>
 <?php echo $_smarty_tpl->tpl_vars['ingredient']->value->nom_ingredient;?>
</li>
			<?php } ?>
			</ul>
		<hr />
		</div>
		<div id="preparation">
			<h2>Préparation : (<?php echo $_smarty_tpl->tpl_vars['recette']->value->temps_prepar;?>
)</h2>
			<p><?php echo $_smarty_tpl->tpl_vars['recette']->value->recette;?>
</p>
			<hr />
		</div>

		<?php if (!is_null($_smarty_tpl->tpl_vars['commentaires']->value)){?>
			<h2>Commentaires :</h2>
			<div id="liste_commentaires">
			<?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentaires']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value){
$_smarty_tpl->tpl_vars['com']->_loop = true;
?>
				<div class="commentaire">
					<h4><a href="<?php echo base_url(('index.php/home/profil/').($_smarty_tpl->tpl_vars['com']->value->id_utilisateur));?>
"><?php echo $_smarty_tpl->tpl_vars['com']->value->login;?>
</a> le <?php echo $_smarty_tpl->tpl_vars['com']->value->date_com;?>
</h4>
					<p><?php echo $_smarty_tpl->tpl_vars['com']->value->commentaire;?>
</p>
				</div>
			<?php } ?>
			
			</div>
		<?php }?>

<?php }else{ ?>
	<div>Erreur : $categories vide !</div>
<?php }?>
</div>

		
		<footer>
			<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

		</footer>
	</div> <!-- /contenu -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</body>
</html><?php }} ?>