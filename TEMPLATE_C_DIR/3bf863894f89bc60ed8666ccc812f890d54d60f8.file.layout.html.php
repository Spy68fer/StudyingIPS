<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-16 08:51:03
         compiled from "C:\web\server2go\htdocs\template\layout.html" */ ?>
<?php /*%%SmartyHeaderCode:31949557fc75720c468-76874656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bf863894f89bc60ed8666ccc812f890d54d60f8' => 
    array (
      0 => 'C:\\web\\server2go\\htdocs\\template\\layout.html',
      1 => 1434391935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31949557fc75720c468-76874656',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_557fc75735db86_12846063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557fc75735db86_12846063')) {function content_557fc75735db86_12846063($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <title>Sample</title>
  </head>
  <body>
    <header>
      This is sample header.
    </header>
    <div class="content">
      <?php echo $_smarty_tpl->tpl_vars['content']->value;?>
  
    </div>    
    <footer>
      2015.IPS.  
    </footer>
  </body>    
</html><?php }} ?>
