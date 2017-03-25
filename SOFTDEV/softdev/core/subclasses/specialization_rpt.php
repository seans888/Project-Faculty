<?php
require_once 'specialization_dd.php';
class specialization_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'SPECIALIZATION_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'specialization_html';
    var $data_subclass = 'specialization';
    var $result_page = 'reporter_result_specialization.php';
    var $cancel_page = 'listview_specialization.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_specialization.php';

    function __construct()
    {
        $this->fields        = specialization_dd::load_dictionary();
        $this->relations     = specialization_dd::load_relationships();
        $this->subclasses    = specialization_dd::load_subclass_info();
        $this->table_name    = specialization_dd::$table_name;
        $this->tables        = specialization_dd::$table_name;
        $this->readable_name = specialization_dd::$readable_name;
        $this->get_report_fields();
    }
}
