<?php
require_once 'facultyload_dd.php';
class facultyload extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = facultyload_dd::load_dictionary();
        $this->relations  = facultyload_dd::load_relationships();
        $this->subclasses = facultyload_dd::load_subclass_info();
        $this->table_name = facultyload_dd::$table_name;
        $this->tables     = facultyload_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('load_id, emp_id, subject_offering_id, date');
            $this->set_values("?,?,?,?");

            $bind_params = array('isii',
                                 &$this->fields['load_id']['value'],
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['subject_offering_id']['value'],
                                 &$this->fields['date']['value']);

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
            $this->set_update("load_id = ?, emp_id = ?, subject_offering_id = ?, date = ?");
            $this->set_where("load_id = ?");

            $bind_params = array('isiii',
                                 &$this->fields['load_id']['value'],
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['subject_offering_id']['value'],
                                 &$this->fields['date']['value'],
                                 $param['orig_load_id']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("load_id = ?");

        $bind_params = array('i',
                             &$this->fields['load_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("load_id = ?");

        $bind_params = array('i',
                             &$this->fields['load_id']['value']);

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
        $this->set_where("load_id = ?");

        $bind_params = array('i',
                             &$this->fields['load_id']['value']);

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
        //Next two lines just to get the orig_ pkey(s) from $param
        $this->escape_arguments($param);
        extract($param);

        $this->set_query_type('SELECT');
        $this->set_where("load_id = ? AND (load_id != '$orig_load_id')");

        $bind_params = array('i',
                             &$this->fields['load_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
