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

require_once 'subclasses/facultyload.php';
$dbh_facultyload = new facultyload;
$dbh_facultyload->set_fields('subject_offering_id, date');
$dbh_facultyload->set_where("emp_id='" . quote_smart($emp_id) . "'");
if($result = $dbh_facultyload->make_query()->result)
{
    $num_facultyload = $dbh_facultyload->num_rows;
    for($a=0; $a<$num_facultyload; $a++)
    {
        $data = $result->fetch_row();
        $cf_facultyload_subject_offering_id[$a] = $data[0];
        $cf_facultyload_date[$a] = $data[1];
    }
}

require_once 'subclasses/specialization.php';
$dbh_specialization = new specialization;
$dbh_specialization->set_fields('specialization_name, specialization_desc');
$dbh_specialization->set_where("emp_id='" . quote_smart($emp_id) . "'");
if($result = $dbh_specialization->make_query()->result)
{
    $num_specialization = $dbh_specialization->num_rows;
    for($a=0; $a<$num_specialization; $a++)
    {
        $data = $result->fetch_row();
        $cf_specialization_specialization_name[$a] = $data[0];
        $cf_specialization_specialization_desc[$a] = $data[1];
    }
}

require_once 'subclasses/availability.php';
$dbh_availability = new availability;
$dbh_availability->set_fields('day, start_time, end_time');
$dbh_availability->set_where("emp_id='" . quote_smart($emp_id) . "'");
if($result = $dbh_availability->make_query()->result)
{
    $num_availability = $dbh_availability->num_rows;
    for($a=0; $a<$num_availability; $a++)
    {
        $data = $result->fetch_row();
        $cf_availability_day[$a] = $data[0];
        $cf_availability_start_time[$a] = $data[1];
        $cf_availability_end_time[$a] = $data[2];
    }
}

