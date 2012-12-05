<?php /* Smarty version Smarty-3.1.7, created on 2012-12-05 16:18:55
         compiled from "application/views\profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:562850ba3507b4a812-85063316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6597e115e444e3337fdd8bba98d4871788afc103' => 
    array (
      0 => 'application/views\\profil.tpl',
      1 => 1354720732,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1354377331,
      2 => 'file',
    ),
    '9002d27a9f2ce3321eba936ddb3679b50b305570' => 
    array (
      0 => 'application/views\\preview_recette.tpl',
      1 => 1354720600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '562850ba3507b4a812-85063316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50ba3507e64c4',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ba3507e64c4')) {function content_50ba3507e64c4($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\UwAmp\\www\\git\\cuisine-resort\\CodeIgniter\\application\\third_party\\Smarty\\plugins\\modifier.truncate.php';
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Profil de <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</title>
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
		
<div id="profil">
		<div id="profil_details">
			<h1>Profil de <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</h1>
			<p><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->type_utilisateur;?>
<br />
			Nom : <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->nom_utilisateur;?>
<br />
			Prénom : <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->prenom;?>
<br />
			e-mail : <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->email;?>
<br />
			Inscrit le :<br /></p>
			<hr />
		</div>
		<div id="profil_recettes">
			<h2>Recettes de <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</h2>

		<div id="liste_recettes">
		<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recettes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
			<!-- <div class="recette">
				<p><a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
">
				<?php if (is_null($_smarty_tpl->tpl_vars['line']->value->image_recette)){?>
					<img class="img_recette" src="<?php echo base_url('images/default/recette.png');?>
" alt="Illustration recette" height="150" width="150" />
				<?php }else{ ?>
					<img class="img_recette" src="<?php echo base_url(((((('images/').($_smarty_tpl->tpl_vars['utilisateur']->value->login)).('/')).($_smarty_tpl->tpl_vars['line']->value->titre)).('/')).($_smarty_tpl->tpl_vars['line']->value->image_recette));?>
" alt="Illustration recette" height="150" width="150" />
				<?php }?>
				</a></p>
				<h3><a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
"> <?php echo $_smarty_tpl->tpl_vars['line']->value->titre;?>
</a></h3>
				<h4>Le <?php echo $_smarty_tpl->tpl_vars['line']->value->date_recette;?>
 par <a href="<?php echo base_url(('index.php/Membre/profil/').($_smarty_tpl->tpl_vars['line']->value->id_utilisateur));?>
"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</a></h4>
				<p class="texte_recette"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['line']->value->recette,250);?>
 <a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
"> Lire la suite</a></p>
				<p>Catégories :
					<?php  $_smarty_tpl->tpl_vars['categorie_recette'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categorie_recette']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['line']->value->liste_categories; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categorie_recette']->key => $_smarty_tpl->tpl_vars['categorie_recette']->value){
$_smarty_tpl->tpl_vars['categorie_recette']->_loop = true;
?>
						<a href="<?php echo base_url(('index.php/Recettes/liste_recettes/').($_smarty_tpl->tpl_vars['categorie_recette']->value->id_categorie));?>
"><?php echo $_smarty_tpl->tpl_vars['categorie_recette']->value->nom_categorie;?>
</a>
					<?php } ?>
				</p>
			</div> -->
			<?php $_smarty_tpl->tpl_vars['showUser'] = new Smarty_variable(45, null, 0);?>
			<?php /*  Call merged included template "preview_recette.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('preview_recette.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('recette'=>$_smarty_tpl->tpl_vars['line']->value), 0, '562850ba3507b4a812-85063316');
content_50bf65df9d891($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "preview_recette.tpl" */?>
		<?php } ?>
		</div>
			<hr />
		</div>
		<div id="profil_commentaires">
			<h2>Commentaires de <?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</h2>
			<div id="liste_commentaires">
			<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentaire']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
				<div class="commentaire">
					<h4>Le <?php echo $_smarty_tpl->tpl_vars['line']->value->date_com;?>
 sur la recette <a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['line']->value->id_recette));?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value->titre;?>
</a></h4>
					<p><?php echo $_smarty_tpl->tpl_vars['line']->value->commentaire;?>
</p>
				</div>
			<?php } ?>
			</div>
		</div>
		</div>

		
		<footer>
			<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 1);?>

		</footer>
	</div> <!-- /contenu -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-12-05 16:18:55
         compiled from "application/views\preview_recette.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50bf65df9d891')) {function content_50bf65df9d891($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\UwAmp\\www\\git\\cuisine-resort\\CodeIgniter\\application\\third_party\\Smarty\\plugins\\modifier.truncate.php';
?>
<?php $_smarty_tpl->tpl_vars['show'] = new Smarty_variable((($tmp = @'showUser')===null||$tmp==='' ? 1 : $tmp), null, 0);?>
<div class="recette">
	<p><a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['recette']->value->id_recette));?>
">
	<?php if (is_null($_smarty_tpl->tpl_vars['recette']->value->image_recette)){?>
		<img class="img_recette" src="<?php echo base_url('images/default/recette.png');?>
" alt="Illustration recette" height="150" width="150" />
	<?php }else{ ?>
		<img class="img_recette" src="<?php echo base_url(((((('images/').($_smarty_tpl->tpl_vars['recette']->value->login)).('/')).($_smarty_tpl->tpl_vars['recette']->value->titre)).('/')).($_smarty_tpl->tpl_vars['recette']->value->image_recette));?>
" alt="Illustration recette" height="150" width="150" />
	<?php }?>
	</a></p>
	<h3><a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['recette']->value->id_recette));?>
"> <?php echo $_smarty_tpl->tpl_vars['recette']->value->titre;?>
</a></h3>
	<h4>Le <?php echo $_smarty_tpl->tpl_vars['recette']->value->date_recette;?>
 <?php if ($_smarty_tpl->tpl_vars['show']->value==1){?>par <a href="<?php echo base_url(('index.php/Membre/profil/').($_smarty_tpl->tpl_vars['recette']->value->id_utilisateur));?>
"><?php echo $_smarty_tpl->tpl_vars['recette']->value->login;?>
</a><?php }?></h4>
	<p class="texte_recette"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['recette']->value->recette,250);?>
 <a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['recette']->value->id_recette));?>
"> Lire la suite</a></p>
	<p>Catégories :
		<?php  $_smarty_tpl->tpl_vars['categorie_recette'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categorie_recette']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recette']->value->liste_categories; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categorie_recette']->key => $_smarty_tpl->tpl_vars['categorie_recette']->value){
$_smarty_tpl->tpl_vars['categorie_recette']->_loop = true;
?>
			<a href="<?php echo base_url(('index.php/Recettes/liste_recettes/').($_smarty_tpl->tpl_vars['categorie_recette']->value->id_categorie));?>
"><?php echo $_smarty_tpl->tpl_vars['categorie_recette']->value->nom_categorie;?>
</a>
		<?php } ?>
	</p>
</div>
<?php }} ?>