<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Delete experiments');

if(isset($_GET['experiment_id']))
{
    $experiment_id = urldecode($_GET['experiment_id']);
    require_once 'form_data_experiments.php';
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_delete']);
    require 'components/query_string_standard.php';

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_experiments.php?$query_string");
    }

    elseif($_POST['btn_delete'])
    {
        log_action('Pressed delete button');
        require_once 'subclasses/experiments.php';
        $dbh_experiments = new experiments;

        $object_name = 'dbh_experiments';
        require 'components/create_form_data.php';

        $dbh_experiments->delete($arr_form_data);


        redirect("listview_experiments.php?$query_string");
    }
}
require 'subclasses/experiments_html.php';
$html = new experiments_html;
$html->draw_header('Delete Experiments', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('experiment_id');

$html->detail_view = TRUE;
$html->draw_controls('delete');

$html->draw_footer();