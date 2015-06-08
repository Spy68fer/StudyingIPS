<?php
    require_once ('include/common.inc.php');
    $surveyInfo = GetSurveyFromRequest();
    $save = SaveSurveyToFile($surveyInfo);
    if ($save == ERR_NO_NAME)
    {
        echo 'There is no parameter email or email is empty.';
    }
    else
    {
        echo ($save !== false) ? 'Data saved.' : "Can't create file!";
    }