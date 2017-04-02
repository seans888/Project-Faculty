<?php
require_once 'taggedemployee_dd.php';
class taggedemployee_html extends html
{
    function __construct()
    {
        $this->fields        = taggedemployee_dd::load_dictionary();
        $this->relations     = taggedemployee_dd::load_relationships();
        $this->subclasses    = taggedemployee_dd::load_subclass_info();
        $this->table_name    = taggedemployee_dd::$table_name;
        $this->readable_name = taggedemployee_dd::$readable_name;
    }
}
