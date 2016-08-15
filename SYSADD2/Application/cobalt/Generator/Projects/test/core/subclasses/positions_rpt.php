<?php
require_once 'positions_dd.php';
class positions_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'POSITIONS_REPORT_CUSTOM';
    var $report_title = 'Positions: Custom Reporting Tool';
    var $html_subclass = 'positions_html';
    var $data_subclass = 'positions';
    var $result_page = 'reporter_result_positions.php';
    var $cancel_page = 'listview_positions.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_positions.php';

    function __construct()
    {
        $this->fields        = positions_dd::load_dictionary();
        $this->relations     = positions_dd::load_relationships();
        $this->subclasses    = positions_dd::load_subclass_info();
        $this->table_name    = positions_dd::$table_name;
        $this->tables        = positions_dd::$table_name;
        $this->readable_name = positions_dd::$readable_name;
        $this->get_report_fields();
    }
}
