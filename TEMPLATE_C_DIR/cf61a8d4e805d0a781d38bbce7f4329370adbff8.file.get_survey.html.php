<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-29 12:18:34
         compiled from "C:\web\server2go\htdocs\template\get_survey.html" */ ?>
<?php /*%%SmartyHeaderCode:176855911b3bd18391-83413422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf61a8d4e805d0a781d38bbce7f4329370adbff8' => 
    array (
      0 => 'C:\\web\\server2go\\htdocs\\template\\get_survey.html',
      1 => 1435573111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176855911b3bd18391-83413422',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55911b3c28c033_69210592',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55911b3c28c033_69210592')) {function content_55911b3c28c033_69210592($_smarty_tpl) {?><h1>Survey</h1>
<form method="post" name="survey" action="">  
  <label>
    Email <br/>
    <input name="email" type="text" value="" />
  </label><br/><br/>

  <input type="submit" value="Get information" name="save" />
</form><?php }} ?>
