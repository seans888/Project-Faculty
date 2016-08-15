<?php
require 'components/get_listview_referrer.php';

require 'subclasses/employee_awards.php';
$dbh_employee_awards = new employee_awards;
$dbh_employee_awards->set_where("emp_id='" . quote_smart($emp_id) . "' AND auto_id='" . quote_smart($auto_id) . "'");
if($result = $dbh_employee_awards->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

    $data = explode('-',$date_received);
    if(count($data) == 3)
    {
        $date_received_year = $data[0];
        $date_received_month = $data[1];
        $date_received_day = $data[2];
    }
}

