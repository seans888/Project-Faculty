<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationresults.php';
$dbh_otevaluationresults = new otevaluationresults;
$dbh_otevaluationresults->set_where("period='" . quote_smart($period) . "' AND target_id='" . quote_smart($target_id) . "' AND class_id='" . quote_smart($class_id) . "'");
if($result = $dbh_otevaluationresults->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

