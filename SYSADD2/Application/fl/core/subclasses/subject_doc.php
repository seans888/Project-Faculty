<?php
require_once 'documentation_class.php';
require_once 'subject_dd.php';
class subject_doc extends documentation
{
    function __construct()
    {
        $this->fields        = subject_dd::load_dictionary();
        $this->relations     = subject_dd::load_relationships();
        $this->subclasses    = subject_dd::load_subclass_info();
        $this->table_name    = subject_dd::$table_name;
        $this->readable_name = subject_dd::$readable_name;
        parent::__construct();
    }
}
