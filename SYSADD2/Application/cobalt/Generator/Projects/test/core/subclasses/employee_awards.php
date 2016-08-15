<?php
require_once 'employee_awards_dd.php';
class employee_awards extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = employee_awards_dd::load_dictionary();
        $this->relations  = employee_awards_dd::load_relationships();
        $this->subclasses = employee_awards_dd::load_subclass_info();
        $this->table_name = employee_awards_dd::$table_name;
        $this->tables     = employee_awards_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('emp_id, auto_id, award_id, date_received');
            $this->set_values("?,?,?,?");

            $bind_params = array('siis',
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['auto_id']['value'],
                                 &$this->fields['award_id']['value'],
                                 &$this->fields['date_received']['value']);

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
            $this->set_update("emp_id = ?, award_id = ?, date_received = ?");
            $this->set_where("emp_id = ? AND auto_id = ?");

            $bind_params = array('sissi',
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['award_id']['value'],
                                 &$this->fields['date_received']['value'],
                                 $param['orig_emp_id'],
                                 &$this->fields['auto_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("emp_id = ? AND auto_id = ?");

        $bind_params = array('si',
                             &$this->fields['emp_id']['value'],
                             &$this->fields['auto_id']['value']);

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
        $this->set_where("emp_id = ? AND auto_id = ?");

        $bind_params = array('si',
                             &$this->fields['emp_id']['value'],
                             &$this->fields['auto_id']['value']);

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
        $this->set_where("emp_id = ? AND auto_id = ? AND (emp_id != '$orig_emp_id' OR auto_id != ?)");

        $bind_params = array('sii',
                             &$this->fields['emp_id']['value'],
                             &$this->fields['auto_id']['value'],
                             &$this->fields['auto_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
