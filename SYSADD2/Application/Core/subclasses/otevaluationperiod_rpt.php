<?php
require_once 'otevaluationperiod_dd.php';
class otevaluationperiod_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONPERIOD_REPORT_CUSTOM';
    var $report_title = 'Otevaluationperiod: Custom Reporting Tool';
    var $html_subclass = 'otevaluationperiod_html';
    var $data_subclass = 'otevaluationperiod';
    var $result_page = 'reporter_result_otevaluationperiod.php';
    var $cancel_page = 'listview_otevaluationperiod.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationperiod.php';

    function __construct()
    {
        $this->fields        = otevaluationperiod_dd::load_dictionary();
        $this->relations     = otevaluationperiod_dd::load_relationships();
        $this->subclasses    = otevaluationperiod_dd::load_subclass_info();
        $this->table_name    = otevaluationperiod_dd::$table_name;
        $this->tables        = otevaluationperiod_dd::$table_name;
        $this->readable_name = otevaluationperiod_dd::$readable_name;
        $this->get_report_fields();
    }
}
