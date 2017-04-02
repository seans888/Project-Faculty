<?php
require 'components/get_listview_referrer.php';

require 'subclasses/refsubjectofferinghdr.php';
$dbh_refsubjectofferinghdr = new refsubjectofferinghdr;
$dbh_refsubjectofferinghdr->set_where("subject_offering_id='" . quote_smart($subject_offering_id) . "'");
if($result = $dbh_refsubjectofferinghdr->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

require_once 'subclasses/refsubjectofferingdtl.php';
$dbh_refsubjectofferingdtl = new refsubjectofferingdtl;
$dbh_refsubjectofferingdtl->set_fields('time, time_start, time_end, day, room, room_type, occupied');
$dbh_refsubjectofferingdtl->set_where("subject_offering_id='" . quote_smart($subject_offering_id) . "'");
if($result = $dbh_refsubjectofferingdtl->make_query()->result)
{
    $num_refsubjectofferingdtl = $dbh_refsubjectofferingdtl->num_rows;
    for($a=0; $a<$num_refsubjectofferingdtl; $a++)
    {
        $data = $result->fetch_row();
        $cf_refsubjectofferingdtl_time[$a] = $data[0];
        $cf_refsubjectofferingdtl_time_start[$a] = $data[1];
        $cf_refsubjectofferingdtl_time_end[$a] = $data[2];
        $cf_refsubjectofferingdtl_day[$a] = $data[3];
        $cf_refsubjectofferingdtl_room[$a] = $data[4];
        $cf_refsubjectofferingdtl_room_type[$a] = $data[5];
        $cf_refsubjectofferingdtl_occupied[$a] = $data[6];
    }
}

