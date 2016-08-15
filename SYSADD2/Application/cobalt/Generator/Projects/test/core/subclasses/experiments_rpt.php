<?php
require_once 'experiments_dd.php';
class experiments_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'EXPERIMENTS_REPORT_CUSTOM';
    var $report_title = 'Experiments: Custom Reporting Tool';
    var $html_subclass = 'experiments_html';
    var $data_subclass = 'experiments';
    var $result_page = 'reporter_result_experiments.php';
    var $cancel_page = 'listview_experiments.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_experiments.php';

    function __construct()
    {
        $this->fields        = experiments_dd::load_dictionary();
        $this->relations     = experiments_dd::load_relationships();
        $this->subclasses    = experiments_dd::load_subclass_info();
        $this->table_name    = experiments_dd::$table_name;
        $this->tables        = experiments_dd::$table_name;
        $this->readable_name = experiments_dd::$readable_name;
        $this->get_report_fields();
    }
}
