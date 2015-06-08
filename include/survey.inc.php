<?php
    define('ERR_OK', 'no_errors');
    define('ERR_NO_FILE', 'no_file');
    define('ERR_NO_NAME', 'no_name');
    define('ERR_NO_ACCESS_TO_FILE', 'no_access');
    define('ERR_UNABLE_TO_PARSE', 'unable_to_parse');

    function GetSurveyFilePath($fileName)
    {
        return 'data/' . $fileName . '.txt';
    }

    function GetSurveyFromRequest()
    {
        $survey = array
        (
            'first_name' => GetParam('first_name'),
            'last_name' => GetParam('last_name'),
            'email' => GetParam('email'),
            'age' => GetParam('age')
        );
        return $survey;
    }
    
    function SaveSurveyToFile($survey)
    {
        $fileName = $survey['email'];
        if (!empty($fileName))
        {
            $filePath = GetSurveyFilePath($fileName);
            return @file_put_contents($filePath, serialize($survey));
        }
        else
        {
            return ERR_NO_NAME;
        }
    }
    
    function GetSurveyFromFile($fileName, &$errorCode)
    {
        $errorCode = ERR_OK;
        $filePath = GetSurveyFilePath($fileName);
        $survey = array();

        if (!file_exists($filePath))
        {
            $errorCode = ERR_NO_FILE;
        }

        if ($errorCode === ERR_OK)
        {
            $survey = file_get_contents($filePath);
            if ( $survey === false )
            {
                $errorCode = ERR_NO_ACCESS_TO_FILE;
            }
        }

        if ($errorCode === ERR_OK)
        {
             $survey = unserialize($survey);
             if ($survey === false)
             {
                 $errorCode = ERR_UNABLE_TO_PARSE;
             }
        }                                               

        return ($errorCode === ERR_OK) ? $survey : false;
    }
    
    function PrintSurvey($survey)
    {
        foreach($survey as $key => $value)
        {
            echo $key . ': ' . $value . "\n";
        }
    }