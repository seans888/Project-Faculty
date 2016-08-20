<?php
require_once 'otevaluationitems_dd.php';
class otevaluationitems_html extends html
{
    function __construct()
    {
        $this->fields        = otevaluationitems_dd::load_dictionary();
        $this->relations     = otevaluationitems_dd::load_relationships();
        $this->subclasses    = otevaluationitems_dd::load_subclass_info();
        $this->table_name    = otevaluationitems_dd::$table_name;
        $this->readable_name = otevaluationitems_dd::$readable_name;
    }
}
