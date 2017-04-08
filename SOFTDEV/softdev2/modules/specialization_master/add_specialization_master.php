<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Add specialization master');

require 'components/get_listview_referrer.php';

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    require 'components/query_string_standard.php';
    require 'subclasses/specialization_master.php';
    $dbh_specialization_master = new specialization_master;

    $object_name = 'dbh_specialization_master';
    require 'components/create_form_data.php';
    extract($arr_form_data);

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_specialization_master.php?$query_string");
    }


    if($_POST['btn_submit'])
    {
        log_action('Pressed submit button');

        $message .= $dbh_specialization_master->sanitize($arr_form_data)->lst_error;
        extract($arr_form_data);

        if($dbh_specialization_master->check_uniqueness($arr_form_data)->is_unique)
        {
            //Good, no duplicate in database
        }
        else
        {
            $message = "Record already exists with the same primary identifiers!";
        }

        if($message=="")
        {
            $dbh_specialization_master->add($arr_form_data);
            $specialization_master_id = $dbh_specialization_master->auto_id;
            require_once 'subclasses/subject.php';
            $dbh_specialization_master = new subject;
            for($a=0; $a<$subject_count;$a++)
            {
                
                $param = array(
                               'term_id'=>$cf_subject_term_id[$a],
                               'subject_code'=>$cf_subject_subject_code[$a],
                               'subject_name'=>$cf_subject_subject_name[$a],
                               'subject_description'=>$cf_subject_subject_description[$a],
                               'unit'=>$cf_subject_unit[$a],
                               'pay_unit'=>$cf_subject_pay_unit[$a],
                               'compute_GPA'=>$cf_subject_compute_GPA[$a],
                               'lab_id'=>$cf_subject_lab_id[$a],
                               'group_owner'=>$cf_subject_group_owner[$a],
                               'evaluate_OTE'=>$cf_subject_evaluate_OTE[$a],
                               'is_elective'=>$cf_subject_is_elective[$a],
                               'grade_type'=>$cf_subject_grade_type[$a],
                               'accept_substitute'=>$cf_subject_accept_substitute[$a],
                               'lab_type_id'=>$cf_subject_lab_type_id[$a],
                               'dept_id'=>$cf_subject_dept_id[$a],
                               'category'=>$cf_subject_category[$a],
                               'assess_note'=>$cf_subject_assess_note[$a],
                               'occupied'=>$cf_subject_occupied[$a],
                               'specialization_master_id'=>$specialization_master_id
                              );
                $dbh_specialization_master->add($param);
            }

            require_once 'subclasses/specialization.php';
            $dbh_specialization_master = new specialization;
            for($a=0; $a<$specialization_count;$a++)
            {
                
                $param = array(
                               'emp_id'=>$cf_specialization_emp_id[$a],
                               'specialization_master_id'=>$specialization_master_id
                              );
                $dbh_specialization_master->add($param);
            }


            redirect("listview_specialization_master.php?$query_string");
        }
    }
}
require 'subclasses/specialization_master_html.php';
$html = new specialization_master_html;
$html->draw_header('Add %%', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);
$html->draw_controls('add');

$html->draw_footer();