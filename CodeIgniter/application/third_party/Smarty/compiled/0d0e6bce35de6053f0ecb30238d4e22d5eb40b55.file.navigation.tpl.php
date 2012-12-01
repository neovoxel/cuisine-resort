<?php /* Smarty version Smarty-3.1.7, created on 2012-12-01 17:01:23
         compiled from "application/views\navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3256550ba28518e95a0-98826608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d0e6bce35de6053f0ecb30238d4e22d5eb40b55' => 
    array (
      0 => 'application/views\\navigation.tpl',
      1 => 1354377651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3256550ba28518e95a0-98826608',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50ba28518ed33',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ba28518ed33')) {function content_50ba28518ed33($_smarty_tpl) {?>
<a href="<?php echo site_url();?>
">Accueil</a>
<a href="<?php echo base_url('index.php/recettes');?>
">Les recettes</a>
<a href="<?php echo base_url('index.php/recettes');?>
">Rechercher</a>
<a href="<?php echo base_url('index.php/membre/connexion');?>
">Connexion</a>
<?php }} ?>