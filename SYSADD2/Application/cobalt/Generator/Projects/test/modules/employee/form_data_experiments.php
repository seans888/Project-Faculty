<?php
require 'components/get_listview_referrer.php';

require 'subclasses/experiments.php';
$dbh_experiments = new experiments;
$dbh_experiments->set_where("experiment_id='" . quote_smart($experiment_id) . "'");
if($result = $dbh_experiments->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

    $data = explode('-',$date);
    if(count($data) == 3)
    {
        $date_year = $data[0];
        $date_month = $data[1];
        $date_day = $data[2];
    }
}

