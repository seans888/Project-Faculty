<?php
require_once 'specialization_master_dd.php';
class specialization_master extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = specialization_master_dd::load_dictionary();
        $this->relations  = specialization_master_dd::load_relationships();
        $this->subclasses = specialization_master_dd::load_subclass_info();
        $this->table_name = specialization_master_dd::$table_name;
        $this->tables     = specialization_master_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('specialization_master_id, specialization_name, specialization_desc');
            $this->set_values("?,?,?");

            $bind_params = array('iss',
                                 &$this->fields['specialization_master_id']['value'],
                                 &$this->fields['specialization_name']['value'],
                                 &$this->fields['specialization_desc']['value']);

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
            $this->set_update("specialization_name = ?, specialization_desc = ?");
            $this->set_where("specialization_master_id = ?");

            $bind_params = array('ssi',
                                 &$this->fields['specialization_name']['value'],
                                 &$this->fields['specialization_desc']['value'],
                                 &$this->fields['specialization_master_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("specialization_master_id = ?");

        $bind_params = array('i',
                             &$this->fields['specialization_master_id']['value']);

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
        $this->set_where("specialization_master_id = ?");

        $bind_params = array('i',
                             &$this->fields['specialization_master_id']['value']);

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
        $this->set_where("specialization_master_id = ? AND (specialization_master_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['specialization_master_id']['value'],
                             &$this->fields['specialization_master_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
