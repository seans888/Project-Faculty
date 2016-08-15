<?php
require_once 'sst_class.php';
require_once 'employee_awards_dd.php';
class employee_awards_sst extends sst
{
    function __construct()
    {
        $this->fields        = employee_awards_dd::load_dictionary();
        $this->relations     = employee_awards_dd::load_relationships();
        $this->subclasses    = employee_awards_dd::load_subclass_info();
        $this->table_name    = employee_awards_dd::$table_name;
        $this->readable_name = employee_awards_dd::$readable_name;
        parent::__construct();
    }
}
