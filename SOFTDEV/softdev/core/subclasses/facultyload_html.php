<?php
require_once 'facultyload_dd.php';
class facultyload_html extends html
{
    function __construct()
    {
        $this->fields        = facultyload_dd::load_dictionary();
        $this->relations     = facultyload_dd::load_relationships();
        $this->subclasses    = facultyload_dd::load_subclass_info();
        $this->table_name    = facultyload_dd::$table_name;
        $this->readable_name = facultyload_dd::$readable_name;
    }
}
