<?php
require 'components/get_listview_referrer.php';

require 'subclasses/refsubjectoteclassification.php';
$dbh_refsubjectoteclassification = new refsubjectoteclassification;
$dbh_refsubjectoteclassification->set_where("period='" . quote_smart($period) . "' AND subject_id='" . quote_smart($subject_id) . "'");
if($result = $dbh_refsubjectoteclassification->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

