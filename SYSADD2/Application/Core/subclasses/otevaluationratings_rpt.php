<?php
require_once 'otevaluationratings_dd.php';
class otevaluationratings_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONRATINGS_REPORT_CUSTOM';
    var $report_title = 'Otevaluationratings: Custom Reporting Tool';
    var $html_subclass = 'otevaluationratings_html';
    var $data_subclass = 'otevaluationratings';
    var $result_page = 'reporter_result_otevaluationratings.php';
    var $cancel_page = 'listview_otevaluationratings.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationratings.php';

    function __construct()
    {
        $this->fields        = otevaluationratings_dd::load_dictionary();
        $this->relations     = otevaluationratings_dd::load_relationships();
        $this->subclasses    = otevaluationratings_dd::load_subclass_info();
        $this->table_name    = otevaluationratings_dd::$table_name;
        $this->tables        = otevaluationratings_dd::$table_name;
        $this->readable_name = otevaluationratings_dd::$readable_name;
        $this->get_report_fields();
    }
}
