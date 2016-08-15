<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Delete employee hobbies');

if(isset($_GET['emp_id']) && isset($_GET['auto_id']))
{
    $emp_id = urldecode($_GET['emp_id']);
    $auto_id = urldecode($_GET['auto_id']);
    require_once 'form_data_employee_hobbies.php';
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_delete']);
    require 'components/query_string_standard.php';

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_employee_hobbies.php?$query_string");
    }

    elseif($_POST['btn_delete'])
    {
        log_action('Pressed delete button');
        require_once 'subclasses/employee_hobbies.php';
        $dbh_employee_hobbies = new employee_hobbies;

        $object_name = 'dbh_employee_hobbies';
        require 'components/create_form_data.php';

        $dbh_employee_hobbies->delete($arr_form_data);


        redirect("listview_employee_hobbies.php?$query_string");
    }
}
require 'subclasses/employee_hobbies_html.php';
$html = new employee_hobbies_html;
$html->draw_header('Delete Employee Hobbies', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('emp_id');
$html->draw_hidden('auto_id');

$html->detail_view = TRUE;
$html->draw_controls('delete');

$html->draw_footer();