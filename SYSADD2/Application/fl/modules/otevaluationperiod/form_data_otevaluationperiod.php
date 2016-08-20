<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationperiod.php';
$dbh_otevaluationperiod = new otevaluationperiod;
$dbh_otevaluationperiod->set_where("period='" . quote_smart($period) . "'");
if($result = $dbh_otevaluationperiod->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

