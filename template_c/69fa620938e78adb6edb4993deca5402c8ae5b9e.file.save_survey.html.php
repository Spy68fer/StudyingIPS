<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-15 20:42:58
         compiled from "D:\web\server2go\htdocs\template\save_survey.html" */ ?>
<?php /*%%SmartyHeaderCode:1335557f136602dda9-62518766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69fa620938e78adb6edb4993deca5402c8ae5b9e' => 
    array (
      0 => 'D:\\web\\server2go\\htdocs\\template\\save_survey.html',
      1 => 1434393334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1335557f136602dda9-62518766',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_557f136608bb47_89868096',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557f136608bb47_89868096')) {function content_557f136608bb47_89868096($_smarty_tpl) {?><h1>Survey</h1>
<form method="post" name="survey" action="">
  <label>
    First name <br/>
    <input name="first_name" type="text" value="" />
  </label><br/>
  <label>
    Last name <br/>
    <input name="last_name" type="text" value="" />
  </label><br/>
  <label>
    Email <br/>
    <input name="email" type="text" value="" />
  </label><br/>
  <label>
    Age <br/>
    <input name="age" type="text" value="" />
  </label><br/><br/>
  <input type="submit" value="Save" name="save" />
</form><?php }} ?>
