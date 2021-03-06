<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('View otevaluationresultsgrouped');

if(isset($_GET['period']) && isset($_GET['target_id']) && isset($_GET['group_id']) && isset($_GET['subject_code']) && isset($_GET['section']))
{
    $period = urldecode($_GET['period']);
    $target_id = urldecode($_GET['target_id']);
    $group_id = urldecode($_GET['group_id']);
    $subject_code = urldecode($_GET['subject_code']);
    $section = urldecode($_GET['section']);
    require 'form_data_otevaluationresultsgrouped.php';
}

if(xsrf_guard())
{
    init_var($_POST['btn_back']);

    if($_POST['btn_back'])
    {
        log_action('Pressed cancel button');
        require 'components/query_string_standard.php';
        redirect("listview_otevaluationresultsgrouped.php?$query_string");
    }
}
require 'subclasses/otevaluationresultsgrouped_html.php';
$html = new otevaluationresultsgrouped_html;
$html->draw_header('Detail View: Otevaluationresultsgrouped', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);
$html->detail_view = TRUE;
$html->draw_controls('view');

$html->draw_footer();