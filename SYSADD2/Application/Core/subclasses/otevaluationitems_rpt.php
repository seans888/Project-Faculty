<?php
require_once 'otevaluationitems_dd.php';
class otevaluationitems_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONITEMS_REPORT_CUSTOM';
    var $report_title = 'Otevaluationitems: Custom Reporting Tool';
    var $html_subclass = 'otevaluationitems_html';
    var $data_subclass = 'otevaluationitems';
    var $result_page = 'reporter_result_otevaluationitems.php';
    var $cancel_page = 'listview_otevaluationitems.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationitems.php';

    function __construct()
    {
        $this->fields        = otevaluationitems_dd::load_dictionary();
        $this->relations     = otevaluationitems_dd::load_relationships();
        $this->subclasses    = otevaluationitems_dd::load_subclass_info();
        $this->table_name    = otevaluationitems_dd::$table_name;
        $this->tables        = otevaluationitems_dd::$table_name;
        $this->readable_name = otevaluationitems_dd::$readable_name;
        $this->get_report_fields();
    }
}
