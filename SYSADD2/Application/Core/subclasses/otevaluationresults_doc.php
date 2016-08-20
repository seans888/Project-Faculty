<?php
require_once 'documentation_class.php';
require_once 'otevaluationresults_dd.php';
class otevaluationresults_doc extends documentation
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
