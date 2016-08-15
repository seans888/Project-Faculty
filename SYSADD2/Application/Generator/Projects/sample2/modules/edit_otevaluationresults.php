<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Edit otevaluationresults');

if(isset($_GET['period']) && isset($_GET['target_id']) && isset($_GET['class_id']))
{
    $period = urldecode($_GET['period']);
    $target_id = urldecode($_GET['target_id']);
    $class_id = urldecode($_GET['class_id']);
    require 'form_data_otevaluationresults.php';
    $orig_period = $period;
    $orig_target_id = $target_id;
    $orig_class_id = $class_id;
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    require 'components/query_string_standard.php';
    require 'subclasses/otevaluationresults.php';
    $dbh_otevaluationresults = new otevaluationresults;

    $object_name = 'dbh_otevaluationresults';
    require 'components/create_form_data.php';
    $arr_form_data['orig_period'] = $_POST['orig_period'];
    $arr_form_data['orig_target_id'] = $_POST['orig_target_id'];
    $arr_form_data['orig_class_id'] = $_POST['orig_class_id'];
    extract($arr_form_data);

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_otevaluationresults.php?$query_string");
    }


    if($_POST['btn_submit'])
    {
        log_action('Pressed submit button');

        $message .= $dbh_otevaluationresults->sanitize($arr_form_data)->lst_error;
        extract($arr_form_data);

        if($dbh_otevaluationresults->check_uniqueness_for_editing($arr_form_data)->is_unique)
        {
            //Good, no duplicate in database
        }
        else
        {
            $message = "Record already exists with the same primary identifiers!";
        }

        if($message=="")
        {
            $dbh_otevaluationresults->edit($arr_form_data);


            redirect("listview_otevaluationresults.php?$query_string");
        }
    }
}
require 'subclasses/otevaluationresults_html.php';
$html = new otevaluationresults_html;
$html->draw_header('Edit Otevaluationresults', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('orig_period');
$html->draw_hidden('orig_target_id');
$html->draw_hidden('orig_class_id');
$html->draw_controls('edit');

$html->draw_footer();