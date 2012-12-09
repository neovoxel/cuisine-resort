<?php /* Smarty version Smarty-3.1.7, created on 2012-12-09 16:45:18
         compiled from "application/views\detail_recette.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1351350ba35020be935-18168721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c056d34624339a0a05874899a4814cc80bae30' => 
    array (
      0 => 'application/views\\detail_recette.tpl',
      1 => 1355065131,
      2 => 'file',
    ),
    '611f477ef18e2c90b72cf51d0af15efaa5aa80cb' => 
    array (
      0 => 'application/views\\main.tpl',
      1 => 1354377331,
      2 => 'file',
    ),
    'bead5d1addf7753ac5ba523dda64dbe6d03eb913' => 
    array (
      0 => 'application/views\\preview_commentaire.tpl',
      1 => 1355059194,
      2 => 'file',
    ),
    '4daf1385a09eed492e9e4fa0e4008f6ca60b415a' => 
    array (
      0 => 'application/views\\form_connexion.tpl',
      1 => 1355065043,
      2 => 'file',
    ),
    '98cec192a8e14c908aada8d0cfbedda6bf16276e' => 
    array (
      0 => 'application/views\\add_commentaire.tpl',
      1 => 1355067870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1351350ba35020be935-18168721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50ba3502398b1',
  'has_nocache_code' => false,
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
 <?php if ($_smarty_tpl->tpl_vars['ci']->value->_isLogOn()&&$_smarty_tpl->tpl_vars['ci']->value->getUser()->userdata('id_utilisateur')==$_smarty_tpl->tpl_vars['utilisateur']->value->id_utilisateur){?><img src="<?php echo base_url('images/edit_recette.gif');?>
" title="Editer la recette" alt="Editer la recette" height="24" width="24" /><?php }?></h1>
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
					<?php } ?>
				</li>
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
		
		<h2>Commentaires :</h2>
		<?php if (!is_null($_smarty_tpl->tpl_vars['commentaires']->value)){?>
			<div id="liste_commentaires">
			<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentaires']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
				<?php /*  Call merged included template "preview_commentaire.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('preview_commentaire.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('showRecette'=>0,'com'=>$_smarty_tpl->tpl_vars['line']->value), 0, '1351350ba35020be935-18168721');
content_50c4b20e92bac($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "preview_commentaire.tpl" */?>
			<?php } ?>
			</div>
		<?php }else{ ?>
			<p>Il n'y a aucun commentaire sur cette recette.</p>
		<?php }?>
		<!-- $smarty.server.HTTP_HOST|cat:$smarty.server.REQUEST_URI -->
		<?php /*  Call merged included template "add_commentaire.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('add_commentaire.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('redirectTo'=>('Recettes/detail_recette/').($_smarty_tpl->tpl_vars['recette']->value->id_recette),'id_recette'=>$_smarty_tpl->tpl_vars['recette']->value->id_recette), 0, '1351350ba35020be935-18168721');
content_50c4b20ea4a1b($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "add_commentaire.tpl" */?>

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
</html><?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-12-09 16:45:18
         compiled from "application/views\preview_commentaire.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50c4b20e92bac')) {function content_50c4b20e92bac($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['showUser'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['showUser']->value)===null||$tmp==='' ? '1' : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['showRecette'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['showRecette']->value)===null||$tmp==='' ? '1' : $tmp), null, 0);?>
<div class="commentaire">
	<h4>
		<?php if ($_smarty_tpl->tpl_vars['showUser']->value==1){?><a href="<?php echo base_url(('index.php/home/profil/').($_smarty_tpl->tpl_vars['com']->value->id_utilisateur));?>
"><?php echo $_smarty_tpl->tpl_vars['com']->value->login;?>
</a><?php }?>
		Le <?php echo $_smarty_tpl->tpl_vars['com']->value->date_com;?>
<?php if ($_smarty_tpl->tpl_vars['showRecette']->value==1){?> sur la recette <a href="<?php echo base_url(('index.php/Recettes/detail_recette/').($_smarty_tpl->tpl_vars['com']->value->id_recette));?>
"><?php echo $_smarty_tpl->tpl_vars['com']->value->titre;?>
</a><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['ci']->value->_isAdmin()){?><img class="img_sup_com" src="<?php echo base_url('images/sup_com.gif');?>
" title="Supprimer le commentaire" alt="Supprimer le commentaire" height="15" width="15" />
		<?php }elseif($_smarty_tpl->tpl_vars['ci']->value->_isLogOn()&&$_smarty_tpl->tpl_vars['ci']->value->getUser()->userdata('id_utilisateur')==$_smarty_tpl->tpl_vars['com']->value->id_utilisateur){?><img class="img_sup_com" src="<?php echo base_url('images/sup_com.gif');?>
" title="Supprimer mon commentaire" alt="Supprimer mon commentaire" height="15" width="15" /><?php }?>
		
	</h4>
	<p><?php echo $_smarty_tpl->tpl_vars['com']->value->commentaire;?>
</p>
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-12-09 16:45:18
         compiled from "application/views\add_commentaire.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50c4b20ea4a1b')) {function content_50c4b20ea4a1b($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['redirectTo'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['redirectTo']->value)===null||$tmp==='' ? '' : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['id_recette'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['id_recette']->value)===null||$tmp==='' ? '0' : $tmp), null, 0);?>
<div id="add_com">
	<fieldset>
	<legend>Ajouter un commentaire</legend>
	<?php if ($_smarty_tpl->tpl_vars['ci']->value->_isLogOn()){?>
		<form action="<?php echo base_url('index.php/Membre/ajouterCommentaire');?>
" method="post">
			<div id="add_com_form">
			<input type="hidden" name="id_recette" value="<?php echo $_smarty_tpl->tpl_vars['id_recette']->value;?>
">
			<input type="hidden" name="redirectTo" value="<?php echo $_smarty_tpl->tpl_vars['redirectTo']->value;?>
">
			<textarea name="commentaire" ></textarea><br />
			<input type="submit" name="form_com" value="Poster" >
			</div>
		</form>
	<?php }else{ ?>
		Vous devez être connecté pour ajouter des commentaires.
		<?php /*  Call merged included template "form_connexion.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('form_connexion.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('redirectTo'=>$_smarty_tpl->tpl_vars['redirectTo']->value), 0, '1351350ba35020be935-18168721');
content_50c4b20eaa955($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "form_connexion.tpl" */?>
	<?php }?>
	</fieldset>
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-12-09 16:45:18
         compiled from "application/views\form_connexion.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50c4b20eaa955')) {function content_50c4b20eaa955($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['redirectTo'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['redirectTo']->value)===null||$tmp==='' ? '' : $tmp), null, 0);?>
<div id="form_connexion" >
	<?php if ((($tmp = @$_smarty_tpl->tpl_vars['erreur']->value)===null||$tmp==='' ? '' : $tmp)){?><span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['erreur']->value;?>
</span><?php }?>
	<form action="<?php echo base_url('index.php/home/connexion');?>
" method="post">
	<fieldset id="formulaire_connexion">
		<legend>Connexion</legend>
		<input type="hidden" name="redirectTo" value="<?php echo $_smarty_tpl->tpl_vars['redirectTo']->value;?>
">
		Login : <input type="text" name="login" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['login']->value)===null||$tmp==='' ? '' : $tmp)){?>value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
"<?php }?> ><br />
		Mot de passe : <input type="password" name="pwd" ><br />
		<input type="submit" name="form_log" value="Connexion">
	</fieldset>
	</form>
</div>
<?php }} ?>