<?php
require_once 'sst_class.php';
require_once 'otevaluationresults_dd.php';
class otevaluationresults_sst extends sst
{
    function __construct()
    {
        $this->fields        = otevaluationresults_dd::load_dictionary();
        $this->relations     = otevaluationresults_dd::load_relationships();
        $this->subclasses    = otevaluationresults_dd::load_subclass_info();
        $this->table_name    = otevaluationresults_dd::$table_name;
        $this->readable_name = otevaluationresults_dd::$readable_name;
        parent::__construct();
    }
}
