<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationclassifications.php';
$dbh_otevaluationclassifications = new otevaluationclassifications;
$dbh_otevaluationclassifications->set_where("id='" . quote_smart($id) . "'");
if($result = $dbh_otevaluationclassifications->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

