<?php
    require_once ('include/common.inc.php');
    $surveyInfo = GetSurveyFromRequest();
    dbConnect();
    $query_insert = "INSERT INTO survey (first_name, last_name, email, age) values (" . array_values($surveyInfo) . " );";
    dbQuery($query_insert);
    dbClose();
    print array_values($surveyInfo);