<?php
require_once 'availability_dd.php';
class availability_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'AVAILABILITY_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'availability_html';
    var $data_subclass = 'availability';
    var $result_page = 'reporter_result_availability.php';
    var $cancel_page = 'listview_availability.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_availability.php';

    function __construct()
    {
        $this->fields        = availability_dd::load_dictionary();
        $this->relations     = availability_dd::load_relationships();
        $this->subclasses    = availability_dd::load_subclass_info();
        $this->table_name    = availability_dd::$table_name;
        $this->tables        = availability_dd::$table_name;
        $this->readable_name = availability_dd::$readable_name;
        $this->get_report_fields();
    }
}
