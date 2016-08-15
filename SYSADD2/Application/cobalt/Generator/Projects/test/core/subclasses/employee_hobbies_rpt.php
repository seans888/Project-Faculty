<?php
require_once 'employee_hobbies_dd.php';
class employee_hobbies_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'EMPLOYEE_HOBBIES_REPORT_CUSTOM';
    var $report_title = 'Employee Hobbies: Custom Reporting Tool';
    var $html_subclass = 'employee_hobbies_html';
    var $data_subclass = 'employee_hobbies';
    var $result_page = 'reporter_result_employee_hobbies.php';
    var $cancel_page = 'listview_employee_hobbies.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_employee_hobbies.php';

    function __construct()
    {
        $this->fields        = employee_hobbies_dd::load_dictionary();
        $this->relations     = employee_hobbies_dd::load_relationships();
        $this->subclasses    = employee_hobbies_dd::load_subclass_info();
        $this->table_name    = employee_hobbies_dd::$table_name;
        $this->tables        = employee_hobbies_dd::$table_name;
        $this->readable_name = employee_hobbies_dd::$readable_name;
        $this->get_report_fields();
    }
}
