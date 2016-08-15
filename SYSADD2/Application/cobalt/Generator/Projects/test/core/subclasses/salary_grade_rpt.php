<?php
require_once 'salary_grade_dd.php';
class salary_grade_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'SALARY_GRADE_REPORT_CUSTOM';
    var $report_title = 'Salary Grade: Custom Reporting Tool';
    var $html_subclass = 'salary_grade_html';
    var $data_subclass = 'salary_grade';
    var $result_page = 'reporter_result_salary_grade.php';
    var $cancel_page = 'listview_salary_grade.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_salary_grade.php';

    function __construct()
    {
        $this->fields        = salary_grade_dd::load_dictionary();
        $this->relations     = salary_grade_dd::load_relationships();
        $this->subclasses    = salary_grade_dd::load_subclass_info();
        $this->table_name    = salary_grade_dd::$table_name;
        $this->tables        = salary_grade_dd::$table_name;
        $this->readable_name = salary_grade_dd::$readable_name;
        $this->get_report_fields();
    }
}
