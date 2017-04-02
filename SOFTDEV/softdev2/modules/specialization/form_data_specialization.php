<?php
require 'components/get_listview_referrer.php';

require 'subclasses/specialization.php';
$dbh_specialization = new specialization;
$dbh_specialization->set_where("specialization_id='" . quote_smart($specialization_id) . "'");
if($result = $dbh_specialization->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

