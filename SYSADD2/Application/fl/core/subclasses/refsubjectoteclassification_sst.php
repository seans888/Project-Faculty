<?php
require_once 'sst_class.php';
require_once 'refsubjectoteclassification_dd.php';
class refsubjectoteclassification_sst extends sst
{
    function __construct()
    {
        $this->fields        = refsubjectoteclassification_dd::load_dictionary();
        $this->relations     = refsubjectoteclassification_dd::load_relationships();
        $this->subclasses    = refsubjectoteclassification_dd::load_subclass_info();
        $this->table_name    = refsubjectoteclassification_dd::$table_name;
        $this->readable_name = refsubjectoteclassification_dd::$readable_name;
        parent::__construct();
    }
}
