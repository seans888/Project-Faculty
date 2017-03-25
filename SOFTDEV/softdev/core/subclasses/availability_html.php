<?php
require_once 'availability_dd.php';
class availability_html extends html
{
    function __construct()
    {
        $this->fields        = availability_dd::load_dictionary();
        $this->relations     = availability_dd::load_relationships();
        $this->subclasses    = availability_dd::load_subclass_info();
        $this->table_name    = availability_dd::$table_name;
        $this->readable_name = availability_dd::$readable_name;
    }
}
