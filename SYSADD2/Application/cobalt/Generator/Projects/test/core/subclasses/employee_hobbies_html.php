<?php
require_once 'employee_hobbies_dd.php';
class employee_hobbies_html extends html
{
    function __construct()
    {
        $this->fields        = employee_hobbies_dd::load_dictionary();
        $this->relations     = employee_hobbies_dd::load_relationships();
        $this->subclasses    = employee_hobbies_dd::load_subclass_info();
        $this->table_name    = employee_hobbies_dd::$table_name;
        $this->readable_name = employee_hobbies_dd::$readable_name;
    }
}
