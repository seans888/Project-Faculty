<?php
require 'components/get_listview_referrer.php';

require 'subclasses/award.php';
$dbh_award = new award;
$dbh_award->set_where("award_id='" . quote_smart($award_id) . "'");
if($result = $dbh_award->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

