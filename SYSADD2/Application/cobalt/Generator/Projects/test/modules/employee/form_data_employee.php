<?php
require 'components/get_listview_referrer.php';

require 'subclasses/employee.php';
$dbh_employee = new employee;
$dbh_employee->set_where("emp_id='" . quote_smart($emp_id) . "'");
if($result = $dbh_employee->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

    $data = explode('-',$birthday);
    if(count($data) == 3)
    {
        $birthday_year = $data[0];
        $birthday_month = $data[1];
        $birthday_day = $data[2];
    }
    $data = explode('-',$hiring_date);
    if(count($data) == 3)
    {
        $hiring_date_year = $data[0];
        $hiring_date_month = $data[1];
        $hiring_date_day = $data[2];
    }
}

