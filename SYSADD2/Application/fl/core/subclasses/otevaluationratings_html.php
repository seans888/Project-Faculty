<?php
require_once 'otevaluationratings_dd.php';
class otevaluationratings_html extends html
{
    function __construct()
    {
        $this->fields        = otevaluationratings_dd::load_dictionary();
        $this->relations     = otevaluationratings_dd::load_relationships();
        $this->subclasses    = otevaluationratings_dd::load_subclass_info();
        $this->table_name    = otevaluationratings_dd::$table_name;
        $this->readable_name = otevaluationratings_dd::$readable_name;
    }
}
