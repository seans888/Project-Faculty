<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationratings.php';
$dbh_otevaluationratings = new otevaluationratings;
$dbh_otevaluationratings->set_where("period='" . quote_smart($period) . "' AND stud_id='" . quote_smart($stud_id) . "' AND item_id='" . quote_smart($item_id) . "' AND target_id='" . quote_smart($target_id) . "' AND subject_code='" . quote_smart($subject_code) . "' AND section='" . quote_smart($section) . "'");
if($result = $dbh_otevaluationratings->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

