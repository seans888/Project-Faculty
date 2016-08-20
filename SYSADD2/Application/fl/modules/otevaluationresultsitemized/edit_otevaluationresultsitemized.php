<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Edit otevaluationresultsitemized');

if(isset($_GET['period']) && isset($_GET['target_id']) && isset($_GET['item_id']) && isset($_GET['subject_code']) && isset($_GET['section']))
{
    $period = urldecode($_GET['period']);
    $target_id = urldecode($_GET['target_id']);
    $item_id = urldecode($_GET['item_id']);
    $subject_code = urldecode($_GET['subject_code']);
    $section = urldecode($_GET['section']);
    require 'form_data_otevaluationresultsitemized.php';
    $orig_period = $period;
    $orig_target_id = $target_id;
    $orig_item_id = $item_id;
    $orig_subject_code = $subject_code;
    $orig_section = $section;
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    require 'components/query_string_standard.php';
    require 'subclasses/otevaluationresultsitemized.php';
    $dbh_otevaluationresultsitemized = new otevaluationresultsitemized;

    $object_name = 'dbh_otevaluationresultsitemized';
    require 'components/create_form_data.php';
    $arr_form_data['orig_period'] = $_POST['orig_period'];
    $arr_form_data['orig_target_id'] = $_POST['orig_target_id'];
    $arr_form_data['orig_item_id'] = $_POST['orig_item_id'];
    $arr_form_data['orig_subject_code'] = $_POST['orig_subject_code'];
    $arr_form_data['orig_section'] = $_POST['orig_section'];
    extract($arr_form_data);

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_otevaluationresultsitemized.php?$query_string");
    }


    if($_POST['btn_submit'])
    {
        log_action('Pressed submit button');

        $message .= $dbh_otevaluationresultsitemized->sanitize($arr_form_data)->lst_error;
        extract($arr_form_data);

        if($dbh_otevaluationresultsitemized->check_uniqueness_for_editing($arr_form_data)->is_unique)
        {
            //Good, no duplicate in database
        }
        else
        {
            $message = "Record already exists with the same primary identifiers!";
        }

        if($message=="")
        {
            $dbh_otevaluationresultsitemized->edit($arr_form_data);


            redirect("listview_otevaluationresultsitemized.php?$query_string");
        }
    }
}
require 'subclasses/otevaluationresultsitemized_html.php';
$html = new otevaluationresultsitemized_html;
$html->draw_header('Edit Otevaluationresultsitemized', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('orig_period');
$html->draw_hidden('orig_target_id');
$html->draw_hidden('orig_item_id');
$html->draw_hidden('orig_subject_code');
$html->draw_hidden('orig_section');
$html->draw_controls('edit');

$html->draw_footer();