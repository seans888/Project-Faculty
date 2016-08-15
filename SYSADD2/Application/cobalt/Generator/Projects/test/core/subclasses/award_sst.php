<?php
require_once 'sst_class.php';
require_once 'award_dd.php';
class award_sst extends sst
{
    function __construct()
    {
        $this->fields        = award_dd::load_dictionary();
        $this->relations     = award_dd::load_relationships();
        $this->subclasses    = award_dd::load_subclass_info();
        $this->table_name    = award_dd::$table_name;
        $this->readable_name = award_dd::$readable_name;
        parent::__construct();
    }
}
