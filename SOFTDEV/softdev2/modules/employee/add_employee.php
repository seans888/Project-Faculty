<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Add employee');

require 'components/get_listview_referrer.php';

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    require 'components/query_string_standard.php';
    require 'subclasses/employee.php';
    $dbh_employee = new employee;

    $object_name = 'dbh_employee';
    require 'components/create_form_data.php';
    extract($arr_form_data);

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_employee.php?$query_string");
    }


    if($_POST['btn_submit'])
    {
        log_action('Pressed submit button');

        $message .= $dbh_employee->sanitize($arr_form_data)->lst_error;
        extract($arr_form_data);

        if($dbh_employee->check_uniqueness($arr_form_data)->is_unique)
        {
            //Good, no duplicate in database
        }
        else
        {
            $message = "Record already exists with the same primary identifiers!";
        }

        if($message=="")
        {
            $dbh_employee->add($arr_form_data);
            
            require_once 'subclasses/availability.php';
            $dbh_employee = new availability;
            for($a=0; $a<$availability_count;$a++)
            {
                
                $param = array(
                               'emp_id'=>$emp_id,
                               'day'=>$cf_availability_day[$a],
                               'start_time'=>$cf_availability_start_time[$a],
                               'end_time'=>$cf_availability_end_time[$a]
                              );
                $dbh_employee->add($param);
            }

            require_once 'subclasses/specialization.php';
            $dbh_employee = new specialization;
            for($a=0; $a<$specialization_count;$a++)
            {
                
                $param = array(
                               'emp_id'=>$emp_id,
                               'specialization_master_id'=>$cf_specialization_specialization_master_id[$a]
                              );
                $dbh_employee->add($param);
            }


            redirect("listview_employee.php?$query_string");
        }
    }
}
require 'subclasses/employee_html.php';
$html = new employee_html;
$html->draw_header('Add %%', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);
$html->draw_controls('add');

$html->draw_footer();