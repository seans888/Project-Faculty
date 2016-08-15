<?php
require_once 'office_docs_dd.php';
class office_docs_html extends html
{
    function __construct()
    {
        $this->fields        = office_docs_dd::load_dictionary();
        $this->relations     = office_docs_dd::load_relationships();
        $this->subclasses    = office_docs_dd::load_subclass_info();
        $this->table_name    = office_docs_dd::$table_name;
        $this->readable_name = office_docs_dd::$readable_name;
    }
}
