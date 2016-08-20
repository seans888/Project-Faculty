<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationresultspersection.php';
$dbh_otevaluationresultspersection = new otevaluationresultspersection;
$dbh_otevaluationresultspersection->set_where("period='" . quote_smart($period) . "' AND target_id='" . quote_smart($target_id) . "' AND subject_code='" . quote_smart($subject_code) . "' AND section='" . quote_smart($section) . "'");
if($result = $dbh_otevaluationresultspersection->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

