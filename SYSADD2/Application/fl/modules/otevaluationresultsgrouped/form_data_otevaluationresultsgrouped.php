<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationresultsgrouped.php';
$dbh_otevaluationresultsgrouped = new otevaluationresultsgrouped;
$dbh_otevaluationresultsgrouped->set_where("period='" . quote_smart($period) . "' AND target_id='" . quote_smart($target_id) . "' AND group_id='" . quote_smart($group_id) . "' AND subject_code='" . quote_smart($subject_code) . "' AND section='" . quote_smart($section) . "'");
if($result = $dbh_otevaluationresultsgrouped->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

