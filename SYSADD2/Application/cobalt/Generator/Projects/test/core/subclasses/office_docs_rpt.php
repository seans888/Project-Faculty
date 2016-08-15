<?php
require_once 'office_docs_dd.php';
class office_docs_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'OFFICE_DOCS_REPORT_CUSTOM';
    var $report_title = 'Office Docs: Custom Reporting Tool';
    var $html_subclass = 'office_docs_html';
    var $data_subclass = 'office_docs';
    var $result_page = 'reporter_result_office_docs.php';
    var $cancel_page = 'listview_office_docs.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_office_docs.php';

    function __construct()
    {
        $this->fields        = office_docs_dd::load_dictionary();
        $this->relations     = office_docs_dd::load_relationships();
        $this->subclasses    = office_docs_dd::load_subclass_info();
        $this->table_name    = office_docs_dd::$table_name;
        $this->tables        = office_docs_dd::$table_name;
        $this->readable_name = office_docs_dd::$readable_name;
        $this->get_report_fields();
    }
}
