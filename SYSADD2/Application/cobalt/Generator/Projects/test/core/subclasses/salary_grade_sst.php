<?php
require_once 'sst_class.php';
require_once 'salary_grade_dd.php';
class salary_grade_sst extends sst
{
    function __construct()
    {
        $this->fields        = salary_grade_dd::load_dictionary();
        $this->relations     = salary_grade_dd::load_relationships();
        $this->subclasses    = salary_grade_dd::load_subclass_info();
        $this->table_name    = salary_grade_dd::$table_name;
        $this->readable_name = salary_grade_dd::$readable_name;
        parent::__construct();
    }
}
