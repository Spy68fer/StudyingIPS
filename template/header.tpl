<!DOCTYPE html>
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
        {include file="top_menu.tpl"}
        {include file="sub_menu.tpl"}
      </div>
      <div class="content">
        {include file="sidebar.tpl"}
        {include file="content.tpl"}