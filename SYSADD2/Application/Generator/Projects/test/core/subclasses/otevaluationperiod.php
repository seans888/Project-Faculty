<?php
require_once 'otevaluationperiod_dd.php';
class otevaluationperiod extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = otevaluationperiod_dd::load_dictionary();
        $this->relations  = otevaluationperiod_dd::load_relationships();
        $this->subclasses = otevaluationperiod_dd::load_subclass_info();
        $this->table_name = otevaluationperiod_dd::$table_name;
        $this->tables     = otevaluationperiod_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('period, school_year, term, midtermfinal, active');
            $this->set_values("?,?,?,?,?");

            $bind_params = array('issss',
                                 &$this->fields['period']['value'],
                                 &$this->fields['school_year']['value'],
                                 &$this->fields['term']['value'],
                                 &$this->fields['midtermfinal']['value'],
                                 &$this->fields['active']['value']);

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
            $this->set_update("school_year = ?, term = ?, midtermfinal = ?, active = ?");
            $this->set_where("period = ?");

            $bind_params = array('ssssi',
                                 &$this->fields['school_year']['value'],
                                 &$this->fields['term']['value'],
                                 &$this->fields['midtermfinal']['value'],
                                 &$this->fields['active']['value'],
                                 &$this->fields['period']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ?");

        $bind_params = array('i',
                             &$this->fields['period']['value']);

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
        $this->set_where("period = ?");

        $bind_params = array('i',
                             &$this->fields['period']['value']);

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
        $this->set_where("period = ? AND (period != ?)");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['period']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
