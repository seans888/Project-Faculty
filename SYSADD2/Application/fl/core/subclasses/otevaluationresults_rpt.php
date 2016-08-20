<?php
require_once 'otevaluationresults_dd.php';
class otevaluationresults_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONRESULTS_REPORT_CUSTOM';
    var $report_title = 'Otevaluationresults: Custom Reporting Tool';
    var $html_subclass = 'otevaluationresults_html';
    var $data_subclass = 'otevaluationresults';
    var $result_page = 'reporter_result_otevaluationresults.php';
    var $cancel_page = 'listview_otevaluationresults.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationresults.php';

    function __construct()
    {
        $this->fields        = otevaluationresults_dd::load_dictionary();
        $this->relations     = otevaluationresults_dd::load_relationships();
        $this->subclasses    = otevaluationresults_dd::load_subclass_info();
        $this->table_name    = otevaluationresults_dd::$table_name;
        $this->tables        = otevaluationresults_dd::$table_name;
        $this->readable_name = otevaluationresults_dd::$readable_name;
        $this->get_report_fields();
    }
}
