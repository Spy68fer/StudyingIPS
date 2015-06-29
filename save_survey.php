<?php
    require_once('include/common.inc.php');

    $isActionSave = (getParam('save') == 'Save');
    if ($isActionSave)
    {
        $info = getSurveyFromRequest();
        dbConnect('survey_xds');
        if (validateSurvey($info))
        {
            saveSurveyToDb($info);
            echo ('Saved!');
        }
        dbClose();   
    }

    buildLayout('save_survey.html');