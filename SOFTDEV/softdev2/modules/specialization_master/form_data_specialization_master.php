<?php
require 'components/get_listview_referrer.php';

require 'subclasses/specialization_master.php';
$dbh_specialization_master = new specialization_master;
$dbh_specialization_master->set_where("specialization_master_id='" . quote_smart($specialization_master_id) . "'");
if($result = $dbh_specialization_master->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

require_once 'subclasses/subject.php';
$dbh_subject = new subject;
$dbh_subject->set_fields('term_id, subject_code, subject_name, subject_description, unit, pay_unit, compute_GPA, lab_id, group_owner, evaluate_OTE, is_elective, grade_type, accept_substitute, lab_type_id, dept_id, category, assess_note, occupied');
$dbh_subject->set_where("specialization_master_id='" . quote_smart($specialization_master_id) . "'");
if($result = $dbh_subject->make_query()->result)
{
    $num_subject = $dbh_subject->num_rows;
    for($a=0; $a<$num_subject; $a++)
    {
        $data = $result->fetch_row();
        $cf_subject_term_id[$a] = $data[0];
        $cf_subject_subject_code[$a] = $data[1];
        $cf_subject_subject_name[$a] = $data[2];
        $cf_subject_subject_description[$a] = $data[3];
        $cf_subject_unit[$a] = $data[4];
        $cf_subject_pay_unit[$a] = $data[5];
        $cf_subject_compute_GPA[$a] = $data[6];
        $cf_subject_lab_id[$a] = $data[7];
        $cf_subject_group_owner[$a] = $data[8];
        $cf_subject_evaluate_OTE[$a] = $data[9];
        $cf_subject_is_elective[$a] = $data[10];
        $cf_subject_grade_type[$a] = $data[11];
        $cf_subject_accept_substitute[$a] = $data[12];
        $cf_subject_lab_type_id[$a] = $data[13];
        $cf_subject_dept_id[$a] = $data[14];
        $cf_subject_category[$a] = $data[15];
        $cf_subject_assess_note[$a] = $data[16];
        $cf_subject_occupied[$a] = $data[17];
    }
}

require_once 'subclasses/specialization.php';
$dbh_specialization = new specialization;
$dbh_specialization->set_fields('emp_id');
$dbh_specialization->set_where("specialization_master_id='" . quote_smart($specialization_master_id) . "'");
if($result = $dbh_specialization->make_query()->result)
{
    $num_specialization = $dbh_specialization->num_rows;
    for($a=0; $a<$num_specialization; $a++)
    {
        $data = $result->fetch_row();
        $cf_specialization_emp_id[$a] = $data[0];
    }
}

