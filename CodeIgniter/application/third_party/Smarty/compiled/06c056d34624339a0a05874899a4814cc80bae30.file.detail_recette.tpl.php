<?php /* Smarty version Smarty-3.1.7, created on 2012-11-29 16:27:50
         compiled from "application/views\detail_recette.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1105850b77606616353-97927737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c056d34624339a0a05874899a4814cc80bae30' => 
    array (
      0 => 'application/views\\detail_recette.tpl',
      1 => 1354202867,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1353492734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1105850b77606616353-97927737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50b77606921e3',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b77606921e3')) {function content_50b77606921e3($_smarty_tpl) {?><!DOCTYPE html>
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
 par <a href="<?php echo base_url(('index.php/Membre/profil/').($_smarty_tpl->tpl_vars['utilisateur']->value->id_utilisateur));?>
"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->login;?>
</a></p>
			<hr />
		</div>
		<div id="ingredients">
			<h2>Ingrédients :</h2>
			<ul>

		foreach ($result_ingredients as $line)
			echo '<li>'.formatIngredient($line['quantite'], $line['nom_unite'], $line['nom_ingredient']).'</li>';
		echo <<< EOF
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


		if (!empty($result_commentaires)) {
			echo <<< EOF
			<h2>Commentaires :</h2>
			<div id="liste_commentaires">

			
			foreach ($result_commentaires as $line)
				echo previewCommentaire($line['id_com']);
			
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