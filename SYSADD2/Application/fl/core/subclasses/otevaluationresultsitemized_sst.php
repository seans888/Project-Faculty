<?php
require_once 'sst_class.php';
require_once 'otevaluationresultsitemized_dd.php';
class otevaluationresultsitemized_sst extends sst
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
