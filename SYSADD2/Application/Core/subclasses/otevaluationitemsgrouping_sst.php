<?php
require_once 'sst_class.php';
require_once 'otevaluationitemsgrouping_dd.php';
class otevaluationitemsgrouping_sst extends sst
{
    function __construct()
    {
        $this->fields        = otevaluationitemsgrouping_dd::load_dictionary();
        $this->relations     = otevaluationitemsgrouping_dd::load_relationships();
        $this->subclasses    = otevaluationitemsgrouping_dd::load_subclass_info();
        $this->table_name    = otevaluationitemsgrouping_dd::$table_name;
        $this->readable_name = otevaluationitemsgrouping_dd::$readable_name;
        parent::__construct();
    }
}
