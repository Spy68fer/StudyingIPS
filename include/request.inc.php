<?php
    function GetParam($parameter)
    {
        $param = (isset($_GET[$parameter])) ? $_GET[$parameter] : '';
        return $param;
    }