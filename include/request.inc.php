<?php

function getParam($name, $defaultValue = '')
{
    return isset($_POST[$name]) ? $_POST[$name] : $defaultValue;
}