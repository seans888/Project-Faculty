<?php
require_once 'documentation_class.php';
require_once 'otevaluationclassifications_dd.php';
class otevaluationclassifications_doc extends documentation
{
    function __construct()
    {
        $this->fields        = otevaluationclassifications_dd::load_dictionary();
        $this->relations     = otevaluationclassifications_dd::load_relationships();
        $this->subclasses    = otevaluationclassifications_dd::load_subclass_info();
        $this->table_name    = otevaluationclassifications_dd::$table_name;
        $this->readable_name = otevaluationclassifications_dd::$readable_name;
        parent::__construct();
    }
}
