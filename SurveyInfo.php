<?php
    require_once ('include/common.inc.php');
    
    header('Content-Type: text/plain');
    $filename = GetParam('email');
    $error = ERR_OK;
    $surveyInfo = GetSurveyFromFile($filename, $error);
    if ($error == ERR_OK)
    {
        PrintSurvey($surveyInfo);
    }
    else
    {
        if ($error == ERR_NO_NAME)
        {
            echo "There is no parameter 'email' or parameter is empty";
        }
        if ($error == ERR_NO_FILE)
        {
            echo 'File "/data/' . $filename . '.txt" does not exist';
        }
        if ($error == ERR_NO_ACCESS_TO_FILE)
        {
            echo 'No access to file';
        }
    }