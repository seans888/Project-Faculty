<?php
require_once 'sst_class.php';
require_once 'otevaluationresultspersection_dd.php';
class otevaluationresultspersection_sst extends sst
{
    function __construct()
    {
        $this->fields        = otevaluationresultspersection_dd::load_dictionary();
        $this->relations     = otevaluationresultspersection_dd::load_relationships();
        $this->subclasses    = otevaluationresultspersection_dd::load_subclass_info();
        $this->table_name    = otevaluationresultspersection_dd::$table_name;
        $this->readable_name = otevaluationresultspersection_dd::$readable_name;
        parent::__construct();
    }
}
