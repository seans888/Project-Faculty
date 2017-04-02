<?php
require_once 'sst_class.php';
require_once 'specialization_master_dd.php';
class specialization_master_sst extends sst
{
    function __construct()
    {
        $this->fields        = specialization_master_dd::load_dictionary();
        $this->relations     = specialization_master_dd::load_relationships();
        $this->subclasses    = specialization_master_dd::load_subclass_info();
        $this->table_name    = specialization_master_dd::$table_name;
        $this->readable_name = specialization_master_dd::$readable_name;
        parent::__construct();
    }
}
