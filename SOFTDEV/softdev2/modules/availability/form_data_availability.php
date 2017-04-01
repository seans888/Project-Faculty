<?php
require 'components/get_listview_referrer.php';

require 'subclasses/availability.php';
$dbh_availability = new availability;
$dbh_availability->set_where("availability_id='" . quote_smart($availability_id) . "'");
if($result = $dbh_availability->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

