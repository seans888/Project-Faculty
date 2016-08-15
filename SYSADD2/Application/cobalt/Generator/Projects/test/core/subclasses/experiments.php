<?php
require_once 'experiments_dd.php';
class experiments extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = experiments_dd::load_dictionary();
        $this->relations  = experiments_dd::load_relationships();
        $this->subclasses = experiments_dd::load_subclass_info();
        $this->table_name = experiments_dd::$table_name;
        $this->tables     = experiments_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('experiment_id, date, title, description, preliminary_result, intermediate_result, final_result');
            $this->set_values("?,?,?,?,?,?,?");

            $bind_params = array('issssss',
                                 &$this->fields['experiment_id']['value'],
                                 &$this->fields['date']['value'],
                                 &$this->fields['title']['value'],
                                 &$this->fields['description']['value'],
                                 &$this->fields['preliminary_result']['value'],
                                 &$this->fields['intermediate_result']['value'],
                                 &$this->fields['final_result']['value']);

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
            $this->set_update("date = ?, title = ?, description = ?, preliminary_result = ?, intermediate_result = ?, final_result = ?");
            $this->set_where("experiment_id = ?");

            $bind_params = array('ssssssi',
                                 &$this->fields['date']['value'],
                                 &$this->fields['title']['value'],
                                 &$this->fields['description']['value'],
                                 &$this->fields['preliminary_result']['value'],
                                 &$this->fields['intermediate_result']['value'],
                                 &$this->fields['final_result']['value'],
                                 &$this->fields['experiment_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("experiment_id = ?");

        $bind_params = array('i',
                             &$this->fields['experiment_id']['value']);

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
        $this->set_where("experiment_id = ?");

        $bind_params = array('i',
                             &$this->fields['experiment_id']['value']);

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
        $this->set_where("experiment_id = ? AND (experiment_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['experiment_id']['value'],
                             &$this->fields['experiment_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
