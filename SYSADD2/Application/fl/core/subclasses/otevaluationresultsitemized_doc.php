<?php
require_once 'documentation_class.php';
require_once 'otevaluationresultsitemized_dd.php';
class otevaluationresultsitemized_doc extends documentation
{
    function __construct()
    {
        $this->fields        = otevaluationresultsitemized_dd::load_dictionary();
        $this->relations     = otevaluationresultsitemized_dd::load_relationships();
        $this->subclasses    = otevaluationresultsitemized_dd::load_subclass_info();
        $this->table_name    = otevaluationresultsitemized_dd::$table_name;
        $this->readable_name = otevaluationresultsitemized_dd::$readable_name;
        parent::__construct();
    }
}
