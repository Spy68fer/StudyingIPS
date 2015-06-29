<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-16 08:51:02
         compiled from "C:\web\server2go\htdocs\template\save_survey.html" */ ?>
<?php /*%%SmartyHeaderCode:4708557fc756e2f876-01666075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2111a3f097cfc8045f9bbfb39a50bc7f0cb9221' => 
    array (
      0 => 'C:\\web\\server2go\\htdocs\\template\\save_survey.html',
      1 => 1434393334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4708557fc756e2f876-01666075',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_557fc757170bc7_92452800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557fc757170bc7_92452800')) {function content_557fc757170bc7_92452800($_smarty_tpl) {?><h1>Survey</h1>
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
