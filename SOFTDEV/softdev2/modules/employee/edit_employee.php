<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Edit employee');

if(isset($_GET['emp_id']))
{
    $emp_id = urldecode($_GET['emp_id']);
    require 'form_data_employee.php';
    $orig_emp_id = $emp_id;
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    require 'components/query_string_standard.php';
    require 'subclasses/employee.php';
    $dbh_employee = new employee;

    $object_name = 'dbh_employee';
    require 'components/create_form_data.php';
    $arr_form_data['orig_emp_id'] = $_POST['orig_emp_id'];
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

        if($dbh_employee->check_uniqueness_for_editing($arr_form_data)->is_unique)
        {
            //Good, no duplicate in database
        }
        else
        {
            $message = "Record already exists with the same primary identifiers!";
        }

        if($message=="")
        {
            require_once 'subclasses/availability.php';
            $dbh_availability = new availability;
            $dbh_availability->delete_many($arr_form_data);

            for($a=0; $a<$availability_count;$a++)
            {
                
                $param = array(
                               'emp_id'=>$emp_id,
                               'day'=>$cf_availability_day[$a],
                               'start_time'=>$cf_availability_start_time[$a],
                               'end_time'=>$cf_availability_end_time[$a]
                              );
                $dbh_availability->add($param);
            }

            require_once 'subclasses/specialization.php';
            $dbh_specialization = new specialization;
            $dbh_specialization->delete_many($arr_form_data);

            for($a=0; $a<$specialization_count;$a++)
            {
                
                $param = array(
                               'emp_id'=>$emp_id,
                               'specialization_master_id'=>$cf_specialization_specialization_master_id[$a]
                              );
                $dbh_specialization->add($param);
            }


            $dbh_employee->edit($arr_form_data);

            redirect("listview_employee.php?$query_string");
        }
    }
}
require 'subclasses/employee_html.php';
$html = new employee_html;
$html->draw_header('Edit %%', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('orig_emp_id');
$html->draw_controls('edit');

$html->draw_footer();