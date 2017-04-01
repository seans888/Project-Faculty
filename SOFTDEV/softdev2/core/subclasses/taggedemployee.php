<?php
require_once 'taggedemployee_dd.php';
class taggedemployee extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = taggedemployee_dd::load_dictionary();
        $this->relations  = taggedemployee_dd::load_relationships();
        $this->subclasses = taggedemployee_dd::load_subclass_info();
        $this->table_name = taggedemployee_dd::$table_name;
        $this->tables     = taggedemployee_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('tag_id, school_year, term, emp_id');
            $this->set_values("?,?,?,?");

            $bind_params = array('isis',
                                 &$this->fields['tag_id']['value'],
                                 &$this->fields['school_year']['value'],
                                 &$this->fields['term']['value'],
                                 &$this->fields['emp_id']['value']);

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
            $this->set_update("school_year = ?, term = ?, emp_id = ?");
            $this->set_where("tag_id = ?");

            $bind_params = array('sisi',
                                 &$this->fields['school_year']['value'],
                                 &$this->fields['term']['value'],
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['tag_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("tag_id = ?");

        $bind_params = array('i',
                             &$this->fields['tag_id']['value']);

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
        $this->set_where("tag_id = ?");

        $bind_params = array('i',
                             &$this->fields['tag_id']['value']);

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
        $this->set_where("tag_id = ? AND (tag_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['tag_id']['value'],
                             &$this->fields['tag_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
