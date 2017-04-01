<?php
require_once 'availability_dd.php';
class availability extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = availability_dd::load_dictionary();
        $this->relations  = availability_dd::load_relationships();
        $this->subclasses = availability_dd::load_subclass_info();
        $this->table_name = availability_dd::$table_name;
        $this->tables     = availability_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('availability_id, emp_id, day, start_time, end_time');
            $this->set_values("?,?,?,?,?");

            $bind_params = array('issss',
                                 &$this->fields['availability_id']['value'],
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['day']['value'],
                                 &$this->fields['start_time']['value'],
                                 &$this->fields['end_time']['value']);

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
            $this->set_update("emp_id = ?, day = ?, start_time = ?, end_time = ?");
            $this->set_where("availability_id = ?");

            $bind_params = array('ssssi',
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['day']['value'],
                                 &$this->fields['start_time']['value'],
                                 &$this->fields['end_time']['value'],
                                 &$this->fields['availability_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("availability_id = ?");

        $bind_params = array('i',
                             &$this->fields['availability_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("emp_id = ?");

        $bind_params = array('s',
                             &$this->fields['emp_id']['value']);

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
        $this->set_where("availability_id = ?");

        $bind_params = array('i',
                             &$this->fields['availability_id']['value']);

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
        $this->set_where("availability_id = ? AND (availability_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['availability_id']['value'],
                             &$this->fields['availability_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
