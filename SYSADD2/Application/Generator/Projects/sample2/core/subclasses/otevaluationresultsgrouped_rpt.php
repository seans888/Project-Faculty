<?php
require_once 'otevaluationresultsgrouped_dd.php';
class otevaluationresultsgrouped_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONRESULTSGROUPED_REPORT_CUSTOM';
    var $report_title = 'Otevaluationresultsgrouped: Custom Reporting Tool';
    var $html_subclass = 'otevaluationresultsgrouped_html';
    var $data_subclass = 'otevaluationresultsgrouped';
    var $result_page = 'reporter_result_otevaluationresultsgrouped.php';
    var $cancel_page = 'listview_otevaluationresultsgrouped.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationresultsgrouped.php';

    function __construct()
    {
        $this->fields        = otevaluationresultsgrouped_dd::load_dictionary();
        $this->relations     = otevaluationresultsgrouped_dd::load_relationships();
        $this->subclasses    = otevaluationresultsgrouped_dd::load_subclass_info();
        $this->table_name    = otevaluationresultsgrouped_dd::$table_name;
        $this->tables        = otevaluationresultsgrouped_dd::$table_name;
        $this->readable_name = otevaluationresultsgrouped_dd::$readable_name;
        $this->get_report_fields();
    }
}
