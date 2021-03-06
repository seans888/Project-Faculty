<?php
require_once 'documentation_class.php';
require_once 'otevaluationitemsgrouping_dd.php';
class otevaluationitemsgrouping_doc extends documentation
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
