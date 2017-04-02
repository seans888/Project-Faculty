<?php
require_once 'subject_dd.php';
class subject_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'SUBJECT_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'subject_html';
    var $data_subclass = 'subject';
    var $result_page = 'reporter_result_subject.php';
    var $cancel_page = 'listview_subject.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_subject.php';

    function __construct()
    {
        $this->fields        = subject_dd::load_dictionary();
        $this->relations     = subject_dd::load_relationships();
        $this->subclasses    = subject_dd::load_subclass_info();
        $this->table_name    = subject_dd::$table_name;
        $this->tables        = subject_dd::$table_name;
        $this->readable_name = subject_dd::$readable_name;
        $this->get_report_fields();
    }
}
