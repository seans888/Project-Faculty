<?php
require_once 'employee_awards_dd.php';
class employee_awards_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'EMPLOYEE_AWARDS_REPORT_CUSTOM';
    var $report_title = 'Employee Awards: Custom Reporting Tool';
    var $html_subclass = 'employee_awards_html';
    var $data_subclass = 'employee_awards';
    var $result_page = 'reporter_result_employee_awards.php';
    var $cancel_page = 'listview_employee_awards.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_employee_awards.php';

    function __construct()
    {
        $this->fields        = employee_awards_dd::load_dictionary();
        $this->relations     = employee_awards_dd::load_relationships();
        $this->subclasses    = employee_awards_dd::load_subclass_info();
        $this->table_name    = employee_awards_dd::$table_name;
        $this->tables        = employee_awards_dd::$table_name;
        $this->readable_name = employee_awards_dd::$readable_name;
        $this->get_report_fields();
    }
}
