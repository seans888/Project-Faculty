<?php
require 'components/get_listview_referrer.php';

require 'subclasses/positions.php';
$dbh_positions = new positions;
$dbh_positions->set_where("position_id='" . quote_smart($position_id) . "'");
if($result = $dbh_positions->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

