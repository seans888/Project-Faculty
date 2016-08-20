<?php
require_once 'refsubjectoteclassification_dd.php';
class refsubjectoteclassification_rpt extends reporter
{
    var $tables='';
    var $session_array_name = 'REFSUBJECTOTECLASSIFICATION_REPORT_CUSTOM';
    var $report_title = 'Refsubjectoteclassification: Custom Reporting Tool';
    var $html_subclass = 'refsubjectoteclassification_html';
    var $data_subclass = 'refsubjectoteclassification';
    var $result_page = 'reporter_result_refsubjectoteclassification.php';
    var $cancel_page = 'listview_refsubjectoteclassification.php';
    var $pdf_reporter_filename = 'reporter_pdfresult_refsubjectoteclassification.php';

    function __construct()
    {
        $this->fields        = refsubjectoteclassification_dd::load_dictionary();
        $this->relations     = refsubjectoteclassification_dd::load_relationships();
        $this->subclasses    = refsubjectoteclassification_dd::load_subclass_info();
        $this->table_name    = refsubjectoteclassification_dd::$table_name;
        $this->tables        = refsubjectoteclassification_dd::$table_name;
        $this->readable_name = refsubjectoteclassification_dd::$readable_name;
        $this->get_report_fields();
    }
}
