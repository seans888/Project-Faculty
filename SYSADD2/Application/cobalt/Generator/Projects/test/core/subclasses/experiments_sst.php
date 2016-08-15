<?php
require_once 'sst_class.php';
require_once 'experiments_dd.php';
class experiments_sst extends sst
{
    function __construct()
    {
        $this->fields        = experiments_dd::load_dictionary();
        $this->relations     = experiments_dd::load_relationships();
        $this->subclasses    = experiments_dd::load_subclass_info();
        $this->table_name    = experiments_dd::$table_name;
        $this->readable_name = experiments_dd::$readable_name;
        parent::__construct();
    }
}
