<?php
require 'components/get_listview_referrer.php';

require 'subclasses/employee_hobbies.php';
$dbh_employee_hobbies = new employee_hobbies;
$dbh_employee_hobbies->set_where("emp_id='" . quote_smart($emp_id) . "' AND auto_id='" . quote_smart($auto_id) . "'");
if($result = $dbh_employee_hobbies->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

