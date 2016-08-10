<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationitemsgrouping.php';
$dbh_otevaluationitemsgrouping = new otevaluationitemsgrouping;
$dbh_otevaluationitemsgrouping->set_where("group_id='" . quote_smart($group_id) . "'");
if($result = $dbh_otevaluationitemsgrouping->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

