<?php
    require_once('include/common.inc.php');

    $isActionSave = (getParam('save') == 'Save');
    if ($isActionSave)
    {
        $info = getSurveyFromRequest2();
        dbConnect('survey_XDS2');
        saveSurveyToDb2($info);
        dbClose();   
    }

