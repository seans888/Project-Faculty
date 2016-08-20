<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationresultsitemized.php';
$dbh_otevaluationresultsitemized = new otevaluationresultsitemized;
$dbh_otevaluationresultsitemized->set_where("period='" . quote_smart($period) . "' AND target_id='" . quote_smart($target_id) . "' AND item_id='" . quote_smart($item_id) . "' AND subject_code='" . quote_smart($subject_code) . "' AND section='" . quote_smart($section) . "'");
if($result = $dbh_otevaluationresultsitemized->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

