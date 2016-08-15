<?php
require_once 'department_dd.php';
class department extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = department_dd::load_dictionary();
        $this->relations  = department_dd::load_relationships();
        $this->subclasses = department_dd::load_subclass_info();
        $this->table_name = department_dd::$table_name;
        $this->tables     = department_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('dept_id, dept_short_name, dept_official_name, dept_head');
            $this->set_values("?,?,?,?");

            $bind_params = array('isss',
                                 &$this->fields['dept_id']['value'],
                                 &$this->fields['dept_short_name']['value'],
                                 &$this->fields['dept_official_name']['value'],
                                 &$this->fields['dept_head']['value']);

            $this->stmt_prepare($bind_params);
        }

        $this->stmt_execute();
        return $this;
    }

    function edit($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('UPDATE');
            $this->set_update("dept_short_name = ?, dept_official_name = ?, dept_head = ?");
            $this->set_where("dept_id = ?");

            $bind_params = array('sssi',
                                 &$this->fields['dept_short_name']['value'],
                                 &$this->fields['dept_official_name']['value'],
                                 &$this->fields['dept_head']['value'],
                                 &$this->fields['dept_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("dept_id = ?");

        $bind_params = array('i',
                             &$this->fields['dept_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("");

        $bind_params = array('',
                             );

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function select()
    {
        $this->set_query_type('SELECT');
        $this->exec_fetch('array');
        return $this;
    }

    function check_uniqueness($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('SELECT');
        $this->set_where("dept_id = ?");

        $bind_params = array('i',
                             &$this->fields['dept_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }

    function check_uniqueness_for_editing($param)
    {
        $this->set_parameters($param);


        $this->set_query_type('SELECT');
        $this->set_where("dept_id = ? AND (dept_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['dept_id']['value'],
                             &$this->fields['dept_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
