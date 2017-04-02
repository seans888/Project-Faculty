<?php
require 'components/get_listview_referrer.php';

require 'subclasses/taggedemployee.php';
$dbh_taggedemployee = new taggedemployee;
$dbh_taggedemployee->set_where("tag_id='" . quote_smart($tag_id) . "'");
if($result = $dbh_taggedemployee->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

