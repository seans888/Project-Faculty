<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Delete reftermperiod');

if(isset($_GET['term_id']) && isset($_GET['period']))
{
    $term_id = urldecode($_GET['term_id']);
    $period = urldecode($_GET['period']);
    require_once 'form_data_reftermperiod.php';
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_delete']);
    require 'components/query_string_standard.php';

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_reftermperiod.php?$query_string");
    }

    elseif($_POST['btn_delete'])
    {
        log_action('Pressed delete button');
        require_once 'subclasses/reftermperiod.php';
        $dbh_reftermperiod = new reftermperiod;

        $object_name = 'dbh_reftermperiod';
        require 'components/create_form_data.php';


        $dbh_reftermperiod->delete($arr_form_data);

        redirect("listview_reftermperiod.php?$query_string");
    }
}
require 'subclasses/reftermperiod_html.php';
$html = new reftermperiod_html;
$html->draw_header('Delete %%', $message, $message_type);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);

$html->draw_hidden('term_id');
$html->draw_hidden('period');

$html->detail_view = TRUE;
$html->draw_controls('delete');

$html->draw_footer();