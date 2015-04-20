<?php
  
  function GetView($template, $vars)
  {
    $template = TEMPLATE_DIR . $template;
    $content = '';
    
    $smarty = new Smarty();
    $smarty->setTemplateDir(TEMPLATE_DIR);
    $smarty->setCompileDir(TEMPLATE_C_DIR);
    $smarty->assign($vars);
    
    return $smarty->fetch($template);
  }
  
  function BuildPage($template, $vars)
  {
    $header = GetView("header.html", $vars);
    $content = GetView($template, $vars);
    $footer = GetView("footer.html", $vars);
    return $header . $content . $footer;
  }