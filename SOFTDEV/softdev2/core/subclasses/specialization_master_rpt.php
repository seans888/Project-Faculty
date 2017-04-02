<?php
require_once 'specialization_master_dd.php';
class specialization_master_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'SPECIALIZATION_MASTER_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'specialization_master_html';
    var $data_subclass = 'specialization_master';
    var $result_page = 'reporter_result_specialization_master.php';
    var $cancel_page = 'listview_specialization_master.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_specialization_master.php';

    function __construct()
    {
        $this->fields        = specialization_master_dd::load_dictionary();
        $this->relations     = specialization_master_dd::load_relationships();
        $this->subclasses    = specialization_master_dd::load_subclass_info();
        $this->table_name    = specialization_master_dd::$table_name;
        $this->tables        = specialization_master_dd::$table_name;
        $this->readable_name = specialization_master_dd::$readable_name;
        $this->get_report_fields();
    }
}
