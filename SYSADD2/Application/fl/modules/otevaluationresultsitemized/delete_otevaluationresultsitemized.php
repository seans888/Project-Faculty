<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Delete otevaluationresultsitemized');

if(isset($_GET['period']) && isset($_GET['target_id']) && isset($_GET['item_id']) && isset($_GET['subject_code']) && isset($_GET['section']))
{
    $period = urldecode($_GET['period']);
    $target_id = urldecode($_GET['target_id']);
    $item_id = urldecode($_GET['item_id']);
    $subject_code = urldecode($_GET['subject_code']);
    $section = urldecode($_GET['section']);
    require_once 'form_data_otevaluationresultsitemized.php';
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_delete']);
    require 'components/query_string_standard.php';

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_otevaluationresultsitemized.php?$query_string");
    }

    elseif($_POST['btn_delete'])
    {
        log_action('Pressed delete button');
        require_once 'subclasses/otevaluationresultsitemized.php';
        $dbh_otevaluationresultsitemized = new otevaluationresultsitemized;

        $object_name = 'dbh_otevaluationresultsitemized';
        require 'components/create_form_data.php';

        $dbh_otevaluationresultsitemized->delete($arr_form_data);


        redirect("listview_otevaluationresultsitemized.php?$query_string");
    }
}
require 'subclasses/otevaluationresultsitemized_html.php';
$html = new otevaluationresultsitemized_html;
$html->draw_header('Delete Otevaluationresultsitemized', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('period');
$html->draw_hidden('target_id');
$html->draw_hidden('item_id');
$html->draw_hidden('subject_code');
$html->draw_hidden('section');

$html->detail_view = TRUE;
$html->draw_controls('delete');

$html->draw_footer();