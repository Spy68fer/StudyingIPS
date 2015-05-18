<?php 
    if (isset($_GET['text']))
    {
        $param = trim($_GET['text']);
        $param = preg_replace('/\s\s+/', ' ', $param);
        echo "Parametr 'text' without extra blanks: " . $param;
    }
    else
    {
        echo "Input parametr 'text'!";
    }
	