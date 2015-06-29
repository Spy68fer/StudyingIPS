<?php
    require_once('include/common.inc.php');

    $isActionSave = (getParam('save') == 'Save');
    if ($isActionSave)
    {
        $email = getEmailFromRequest;
        dbConnect('survey_xds');
        if (validateSurvey($email))
        {
            $surveyInfo = getSurveyFromDb($email);
            echo ('loading..');
        }
        dbClose();
  
        printSurvey($surveyInfo);
    }
    buildLayout('get_survey.html');
    