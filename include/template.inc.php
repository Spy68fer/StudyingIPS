<?php
  
  function getView($template, $vars)
  {
    $template = TEMPLATE_DIR . $template;
    $content = '';
    
    $smarty = new Smarty();
    $smarty->setTemplateDir(TEMPLATE_DIR);
    $smarty->setCompileDir(TEMPLATE_C_DIR);
    $smarty->assign($vars);
    
    return $smarty->fetch($template);
  }

    function buildLayout($templateName, $vars = array())
    {
        $content = getView($templateName, $vars);
        $vars = array
        (
            "content" => $content      
        );    
        echo getView("layout.html", $vars);
    }    
  
    function buildPage($template, $vars = array())
    {
        $header = getView('header.tpl', $vars);
        $content = getView($template, $vars);
        $footer = getView('footer.tpl', $vars);
        return $header . $content . $footer;
    }