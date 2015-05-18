<?php
	
    define('NO_ERROR', 0);
    define('NO_PARAM_ERROR', 1);
    define('DIGIT_BEGIN_ERROR', 2);
    define('IDEN_NO_CORRECT_ERROR', 3);
    
    $errorCode = NO_ERROR;

    $id = isset($_GET['iden']) ? $_GET['iden'] : '';

    if (empty($id))
    {
        $errorCode = NO_PARAM_ERROR;
    }

    if ($errorCode == ERR_OK && is_numeric($id[0])) 
    {
        $errorCode = DIGIT_BEGIN_ERROR;
    }
    
    if ($errorCode == ERR_OK && !ctype_alnum($id)) 
    {
        $errorCode = IDEN_NO_CORRECT_ERROR;
    }
    
    $messages = array
    (
        NO_ERROR => "The identifier is correct.",
        NO_PARAM_ERROR => "There is no identifier or it is empty.",
        DIGIT_BEGIN_ERROR => "There is digit in the beginning of identifier.",
        IDEN_NO_CORRECT_ERROR => "There is not correct identifier (it has specials symbols.)"
    );

    echo ($errorCode == ERR_OK) ? $messages[$errorCode] . ' Identifier: ' . $id : $messages[$errorCode]; 