<?php
require_once 'facultyload_dd.php';
class facultyload_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'FACULTYLOAD_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'facultyload_html';
    var $data_subclass = 'facultyload';
    var $result_page = 'reporter_result_facultyload.php';
    var $cancel_page = 'listview_facultyload.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_facultyload.php';

    function __construct()
    {
        $this->fields        = facultyload_dd::load_dictionary();
        $this->relations     = facultyload_dd::load_relationships();
        $this->subclasses    = facultyload_dd::load_subclass_info();
        $this->table_name    = facultyload_dd::$table_name;
        $this->tables        = facultyload_dd::$table_name;
        $this->readable_name = facultyload_dd::$readable_name;
        $this->get_report_fields();
    }
}
