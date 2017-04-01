<?php
require_once 'otevaluationresultspersection_dd.php';
class otevaluationresultspersection_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OTEVALUATIONRESULTSPERSECTION_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'otevaluationresultspersection_html';
    var $data_subclass = 'otevaluationresultspersection';
    var $result_page = 'reporter_result_otevaluationresultspersection.php';
    var $cancel_page = 'listview_otevaluationresultspersection.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_otevaluationresultspersection.php';

    function __construct()
    {
        $this->fields        = otevaluationresultspersection_dd::load_dictionary();
        $this->relations     = otevaluationresultspersection_dd::load_relationships();
        $this->subclasses    = otevaluationresultspersection_dd::load_subclass_info();
        $this->table_name    = otevaluationresultspersection_dd::$table_name;
        $this->tables        = otevaluationresultspersection_dd::$table_name;
        $this->readable_name = otevaluationresultspersection_dd::$readable_name;
        $this->get_report_fields();
    }
}
