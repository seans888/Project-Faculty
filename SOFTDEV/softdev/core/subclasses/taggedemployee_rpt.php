<?php
require_once 'taggedemployee_dd.php';
class taggedemployee_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'TAGGEDEMPLOYEE_REPORT_CUSTOM';
    var $report_title = '%%: Custom Reporting Tool';
    var $html_subclass = 'taggedemployee_html';
    var $data_subclass = 'taggedemployee';
    var $result_page = 'reporter_result_taggedemployee.php';
    var $cancel_page = 'listview_taggedemployee.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_taggedemployee.php';

    function __construct()
    {
        $this->fields        = taggedemployee_dd::load_dictionary();
        $this->relations     = taggedemployee_dd::load_relationships();
        $this->subclasses    = taggedemployee_dd::load_subclass_info();
        $this->table_name    = taggedemployee_dd::$table_name;
        $this->tables        = taggedemployee_dd::$table_name;
        $this->readable_name = taggedemployee_dd::$readable_name;
        $this->get_report_fields();
    }
}
