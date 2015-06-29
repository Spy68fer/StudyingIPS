<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-22 11:43:37
         compiled from "C:\web\server2go\htdocs\template\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:218855587d35947a1d0-84530498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8789403fb7c1a99b3b7479625c252c235f2283e6' => 
    array (
      0 => 'C:\\web\\server2go\\htdocs\\template\\header.tpl',
      1 => 1434966172,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218855587d35947a1d0-84530498',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5587d3594d58d0_61380459',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5587d3594d58d0_61380459')) {function content_5587d3594d58d0_61380459($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/footer.css" />
  </head>
  <body>
    <div class="main">
      <div class="header">
        <?php echo $_smarty_tpl->getSubTemplate ("top_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("sub_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      </div>
      <div class="content">
        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
