<?php
require_once 'positions_dd.php';
class positions extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = positions_dd::load_dictionary();
        $this->relations  = positions_dd::load_relationships();
        $this->subclasses = positions_dd::load_subclass_info();
        $this->table_name = positions_dd::$table_name;
        $this->tables     = positions_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('position_id, title, description');
            $this->set_values("?,?,?");

            $bind_params = array('iss',
                                 &$this->fields['position_id']['value'],
                                 &$this->fields['title']['value'],
                                 &$this->fields['description']['value']);

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
            $this->set_update("title = ?, description = ?");
            $this->set_where("position_id = ?");

            $bind_params = array('ssi',
                                 &$this->fields['title']['value'],
                                 &$this->fields['description']['value'],
                                 &$this->fields['position_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("position_id = ?");

        $bind_params = array('i',
                             &$this->fields['position_id']['value']);

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
        $this->set_where("position_id = ?");

        $bind_params = array('i',
                             &$this->fields['position_id']['value']);

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
        $this->set_where("position_id = ? AND (position_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['position_id']['value'],
                             &$this->fields['position_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}