<?php
    define('ERR_OK', 'no_errors');
    define('ERR_NO_FILE', 'no_file');
    define('ERR_NO_NAME', 'no_name');
    define('ERR_NO_ACCESS_TO_FILE', 'no_access');
    define('ERR_UNABLE_TO_PARSE', 'unable_to_parse');

    function getSurveyFilePath($fileName)
    {
        return 'data/' . $fileName . '.txt';
    }

    function getSurveyFromRequest()
    {
        $survey = array
        (
            'first_name' => getParam('first_name'),
            'last_name' => getParam('last_name'),
            'email' => getParam('email'),
            'age' => getParam('age')
        );
        return $survey;
    }
    
     function getEmailFromRequest()
    {
        $mail = getParam('email');
        return $mail;
    }
    
    function validateSurvey($info)
    {
        return !empty($info['email']);
    }
    
    function saveSurveyToFile($survey)
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
    
    function saveSurveyToDb($surveyInfo)
    {
        $firstName = dbQuote($surveyInfo['first_name']);
        $lastName = dbQuote($surveyInfo['last_name']);
        $email = dbQuote($surveyInfo['email']);
        $age = dbQuote($surveyInfo['age']);
    
        $sql = "INSERT INTO survey SET " .
            " first_name = '{$firstName}', " . 
            " last_name = '{$lastName}', " .
            " email = '{$email}', " .
            " age = '{$age}'";

        dbQuery($sql);
    }
    
    
    
    function getSurveyFromDb($fileName)
    {
        $email = dbQuote($surveyInfo['email']);
        $sql = "SELECT * FROM survey WHERE " .
            " email = '{$email}', " .
        dbQuery($sql); 
    }
    
    function getSurveyFromFile($fileName, &$errorCode)
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
    
    function printSurvey($survey)
    {
        foreach($survey as $key => $value)
        {
            echo $key . ': ' . $value . "\n";
        }
    }