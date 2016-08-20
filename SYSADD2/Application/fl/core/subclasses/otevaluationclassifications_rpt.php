<?php
require_once 'otevaluationclassifications_dd.php';
class otevaluationclassifications_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONCLASSIFICATIONS_REPORT_CUSTOM';
    var $report_title = 'Otevaluationclassifications: Custom Reporting Tool';
    var $html_subclass = 'otevaluationclassifications_html';
    var $data_subclass = 'otevaluationclassifications';
    var $result_page = 'reporter_result_otevaluationclassifications.php';
    var $cancel_page = 'listview_otevaluationclassifications.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationclassifications.php';

    function __construct()
    {
        $this->fields        = otevaluationclassifications_dd::load_dictionary();
        $this->relations     = otevaluationclassifications_dd::load_relationships();
        $this->subclasses    = otevaluationclassifications_dd::load_subclass_info();
        $this->table_name    = otevaluationclassifications_dd::$table_name;
        $this->tables        = otevaluationclassifications_dd::$table_name;
        $this->readable_name = otevaluationclassifications_dd::$readable_name;
        $this->get_report_fields();
    }
}
