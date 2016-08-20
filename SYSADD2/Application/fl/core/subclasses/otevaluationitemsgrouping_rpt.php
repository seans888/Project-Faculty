<?php
require_once 'otevaluationitemsgrouping_dd.php';
class otevaluationitemsgrouping_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONITEMSGROUPING_REPORT_CUSTOM';
    var $report_title = 'Otevaluationitemsgrouping: Custom Reporting Tool';
    var $html_subclass = 'otevaluationitemsgrouping_html';
    var $data_subclass = 'otevaluationitemsgrouping';
    var $result_page = 'reporter_result_otevaluationitemsgrouping.php';
    var $cancel_page = 'listview_otevaluationitemsgrouping.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationitemsgrouping.php';

    function __construct()
    {
        $this->fields        = otevaluationitemsgrouping_dd::load_dictionary();
        $this->relations     = otevaluationitemsgrouping_dd::load_relationships();
        $this->subclasses    = otevaluationitemsgrouping_dd::load_subclass_info();
        $this->table_name    = otevaluationitemsgrouping_dd::$table_name;
        $this->tables        = otevaluationitemsgrouping_dd::$table_name;
        $this->readable_name = otevaluationitemsgrouping_dd::$readable_name;
        $this->get_report_fields();
    }
}
