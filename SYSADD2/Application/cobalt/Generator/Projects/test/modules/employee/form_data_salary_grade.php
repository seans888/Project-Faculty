<?php
require 'components/get_listview_referrer.php';

require 'subclasses/salary_grade.php';
$dbh_salary_grade = new salary_grade;
$dbh_salary_grade->set_where("salary_grade_id='" . quote_smart($salary_grade_id) . "'");
if($result = $dbh_salary_grade->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

