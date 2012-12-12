<?php /* Smarty version Smarty-3.1.7, created on 2012-12-05 16:21:43
         compiled from "application/views\navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1022750bf66877b0a77-20592032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d0e6bce35de6053f0ecb30238d4e22d5eb40b55' => 
    array (
      0 => 'application/views\\navigation.tpl',
      1 => 1354719133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022750bf66877b0a77-20592032',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ci' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_50bf66877ded1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bf66877ded1')) {function content_50bf66877ded1($_smarty_tpl) {?>
<a href="<?php echo site_url();?>
">Accueil</a>
<a href="<?php echo base_url('index.php/recettes');?>
">Les recettes</a>
<a href="<?php echo base_url('index.php/recettes');?>
">Rechercher</a>
<?php if (!$_smarty_tpl->tpl_vars['ci']->value->_isLogOn()){?>
<a href="<?php echo base_url('index.php/home/connexion');?>
">Connexion</a>
<?php }elseif($_smarty_tpl->tpl_vars['ci']->value->_isLogOn()){?>
<a href="<?php echo base_url('index.php/home/deconnexion');?>
">Déconnexion</a>
<?php }?><?php }} ?>