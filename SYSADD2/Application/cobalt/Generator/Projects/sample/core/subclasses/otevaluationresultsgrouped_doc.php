<?php
require_once 'documentation_class.php';
require_once 'otevaluationresultsgrouped_dd.php';
class otevaluationresultsgrouped_doc extends documentation
{
    function __construct()
    {
        $this->fields        = otevaluationresultsgrouped_dd::load_dictionary();
        $this->relations     = otevaluationresultsgrouped_dd::load_relationships();
        $this->subclasses    = otevaluationresultsgrouped_dd::load_subclass_info();
        $this->table_name    = otevaluationresultsgrouped_dd::$table_name;
        $this->readable_name = otevaluationresultsgrouped_dd::$readable_name;
        parent::__construct();
    }
}
