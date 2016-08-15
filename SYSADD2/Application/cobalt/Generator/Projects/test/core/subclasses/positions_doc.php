<?php
require_once 'documentation_class.php';
require_once 'positions_dd.php';
class positions_doc extends documentation
{
    function __construct()
    {
        $this->fields        = positions_dd::load_dictionary();
        $this->relations     = positions_dd::load_relationships();
        $this->subclasses    = positions_dd::load_subclass_info();
        $this->table_name    = positions_dd::$table_name;
        $this->readable_name = positions_dd::$readable_name;
        parent::__construct();
    }
}
