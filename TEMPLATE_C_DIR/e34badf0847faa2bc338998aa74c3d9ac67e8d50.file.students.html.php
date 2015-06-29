<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-22 06:34:35
         compiled from "C:\web\server2go\htdocs\template\students.html" */ ?>
<?php /*%%SmartyHeaderCode:218325587905b692cb4-85083002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e34badf0847faa2bc338998aa74c3d9ac67e8d50' => 
    array (
      0 => 'C:\\web\\server2go\\htdocs\\template\\students.html',
      1 => 1432100606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218325587905b692cb4-85083002',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'students' => 0,
    'student' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5587905b969622_51741815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5587905b969622_51741815')) {function content_5587905b969622_51741815($_smarty_tpl) {?><h1>Students</h1>
<ul>
  <?php  $_smarty_tpl->tpl_vars['student'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['student']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['students']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['student']->key => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
?>
  <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['student']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
, <?php echo $_smarty_tpl->tpl_vars['student']->value['age'];?>
</li>
  <?php } ?>
</ul><?php }} ?>
