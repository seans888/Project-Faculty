<?php
require_once 'specialization_dd.php';
class specialization_html extends html
{
    function __construct()
    {
        $this->fields        = specialization_dd::load_dictionary();
        $this->relations     = specialization_dd::load_relationships();
        $this->subclasses    = specialization_dd::load_subclass_info();
        $this->table_name    = specialization_dd::$table_name;
        $this->readable_name = specialization_dd::$readable_name;
    }
}
