<?php
require 'components/get_listview_referrer.php';

require 'subclasses/otevaluationitems.php';
$dbh_otevaluationitems = new otevaluationitems;
$dbh_otevaluationitems->set_where("period='" . quote_smart($period) . "' AND item_id='" . quote_smart($item_id) . "'");
if($result = $dbh_otevaluationitems->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

