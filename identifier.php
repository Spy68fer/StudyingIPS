<?php
    define('ERR_OK', 0);
    define('ERR_NO_PARAM', 1);
    define('ERR_START_WITH_DIGIT', 2);
    define('ERR_NO_CORRECT', 3);
    
    $errorCode = ERR_OK;

    $id = isset($_GET['identifier']) ? $_GET['identifier'] : '';

    if (empty($id))
    {
        $errorCode = ERR_NO_PARAM;
    }

    if ($errorCode == ERR_OK && is_numeric($id[0]))
    {
        $errorCode = ERR_START_WITH_DIGIT;
    }
    
    if ($errorCode == ERR_OK && !ctype_alnum($id))
    {
        $errorCode = ERR_NO_CORECT;
    }
    
    $messages = array
    (
        ERR_NO_PARAM => 'There is no parameter "identifier" or identifier is empty.',
        ERR_START_WITH_DIGIT => "Identifier can't start with digit. This identifier isn't correct!!!",
        ERR_NO_CORRECT => 'This identifier includes unallowable symbols! Only letters and digits are allowed.',
        ERR_OK => 'Yes! This identifier is correct!'
    );

    echo ($errorCode == ERR_OK) ? $id : $messages[$errorCode];