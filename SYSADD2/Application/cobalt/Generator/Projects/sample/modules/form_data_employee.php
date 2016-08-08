<?php
require 'components/get_listview_referrer.php';

require 'subclasses/employee.php';
$dbh_employee = new employee;
$dbh_employee->set_where("emp_id='" . quote_smart($emp_id) . "'");
if($result = $dbh_employee->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

    $data = explode('-',$hiring_date);
    if(count($data) == 3)
    {
        $hiring_date_year = $data[0];
        $hiring_date_month = $data[1];
        $hiring_date_day = $data[2];
    }
    $data = explode('-',$resignation_date);
    if(count($data) == 3)
    {
        $resignation_date_year = $data[0];
        $resignation_date_month = $data[1];
        $resignation_date_day = $data[2];
    }
    $data = explode('-',$birth_date);
    if(count($data) == 3)
    {
        $birth_date_year = $data[0];
        $birth_date_month = $data[1];
        $birth_date_day = $data[2];
    }
}

