<?php
require_once 'otevaluationresultsitemized_dd.php';
class otevaluationresultsitemized_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONRESULTSITEMIZED_REPORT_CUSTOM';
    var $report_title = 'Otevaluationresultsitemized: Custom Reporting Tool';
    var $html_subclass = 'otevaluationresultsitemized_html';
    var $data_subclass = 'otevaluationresultsitemized';
    var $result_page = 'reporter_result_otevaluationresultsitemized.php';
    var $cancel_page = 'listview_otevaluationresultsitemized.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationresultsitemized.php';

    function __construct()
    {
        $this->fields        = otevaluationresultsitemized_dd::load_dictionary();
        $this->relations     = otevaluationresultsitemized_dd::load_relationships();
        $this->subclasses    = otevaluationresultsitemized_dd::load_subclass_info();
        $this->table_name    = otevaluationresultsitemized_dd::$table_name;
        $this->tables        = otevaluationresultsitemized_dd::$table_name;
        $this->readable_name = otevaluationresultsitemized_dd::$readable_name;
        $this->get_report_fields();
    }
}
