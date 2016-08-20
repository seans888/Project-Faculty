<?php
require_once 'sst_class.php';
require_once 'otevaluationperiod_dd.php';
class otevaluationperiod_sst extends sst
{
    function __construct()
    {
        $this->fields        = otevaluationperiod_dd::load_dictionary();
        $this->relations     = otevaluationperiod_dd::load_relationships();
        $this->subclasses    = otevaluationperiod_dd::load_subclass_info();
        $this->table_name    = otevaluationperiod_dd::$table_name;
        $this->readable_name = otevaluationperiod_dd::$readable_name;
        parent::__construct();
    }
}
