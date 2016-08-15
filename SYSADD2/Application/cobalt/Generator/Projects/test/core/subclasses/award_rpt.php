<?php
require_once 'award_dd.php';
class award_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'AWARD_REPORT_CUSTOM';
    var $report_title = 'Award: Custom Reporting Tool';
    var $html_subclass = 'award_html';
    var $data_subclass = 'award';
    var $result_page = 'reporter_result_award.php';
    var $cancel_page = 'listview_award.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_award.php';

    function __construct()
    {
        $this->fields        = award_dd::load_dictionary();
        $this->relations     = award_dd::load_relationships();
        $this->subclasses    = award_dd::load_subclass_info();
        $this->table_name    = award_dd::$table_name;
        $this->tables        = award_dd::$table_name;
        $this->readable_name = award_dd::$readable_name;
        $this->get_report_fields();
    }
}
