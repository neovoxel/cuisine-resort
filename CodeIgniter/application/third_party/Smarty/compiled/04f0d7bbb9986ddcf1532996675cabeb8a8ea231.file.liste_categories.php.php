<?php /* Smarty version Smarty-3.1.7, created on 2012-11-19 20:11:39
         compiled from "application/views\liste_categories.php" */ ?>
<?php /*%%SmartyHeaderCode:3276650aa846b2ffb94-18660871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04f0d7bbb9986ddcf1532996675cabeb8a8ea231' => 
    array (
      0 => 'application/views\\liste_categories.php',
      1 => 1353351835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3276650aa846b2ffb94-18660871',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50aa846b329c6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50aa846b329c6')) {function content_50aa846b329c6($_smarty_tpl) {?><div id="contenu">
<div id="liste_categories">
	<<?php ?>?php foreach($categories as $line) :
	$id_categorie	 = $line->id_categorie;
	$image_categorie = $line->image_categorie;
	$nom_categorie	 = $line->nom_categorie;
	$nb_recettes	 = 0;
?<?php ?>>

	<div class="categorie" >
	<a href="./index.php?page=recettes&idc=<<?php ?>?php echo $id_categorie ?<?php ?>>"><img class="img_categorie" src="./images/categories/<<?php ?>?php echo $image_categorie ?<?php ?>>" /></a>
	<h1><a href="./index.php?page=recettes&idc=<<?php ?>?php echo $id_categorie ?<?php ?>>"><<?php ?>?php echo $nom_categorie ?<?php ?>></a></h1>
	<p>Il y a actuellement <<?php ?>?php echo $nb_recettes ?<?php ?>> recettes dans cette catégorie.<br />
	<a href="index.php?page=recettes&idc=<<?php ?>?php echo $id_categorie ?<?php ?>>" >Voir les recettes</a><br />
	<a href="index.php?page=ajouter_recette&idc=<<?php ?>?php echo $id_categorie ?<?php ?>>" >Ajouter une recette</a><p>
	</div>
<<?php ?>?php endforeach; ?<?php ?>>
</div>
</div>
<?php }} ?>