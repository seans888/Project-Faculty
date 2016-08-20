<?php
require_once 'otevaluationitems_dd.php';
class otevaluationitems extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = otevaluationitems_dd::load_dictionary();
        $this->relations  = otevaluationitems_dd::load_relationships();
        $this->subclasses = otevaluationitems_dd::load_subclass_info();
        $this->table_name = otevaluationitems_dd::$table_name;
        $this->tables     = otevaluationitems_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('period, item_id, group_id, entry, number');
            $this->set_values("?,?,?,?,?");

            $bind_params = array('iiisd',
                                 &$this->fields['period']['value'],
                                 &$this->fields['item_id']['value'],
                                 &$this->fields['group_id']['value'],
                                 &$this->fields['entry']['value'],
                                 &$this->fields['number']['value']);

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
            $this->set_update("period = ?, group_id = ?, entry = ?, number = ?");
            $this->set_where("period = ? AND item_id = ?");

            $bind_params = array('iisdii',
                                 &$this->fields['period']['value'],
                                 &$this->fields['group_id']['value'],
                                 &$this->fields['entry']['value'],
                                 &$this->fields['number']['value'],
                                 $param['orig_period'],
                                 &$this->fields['item_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND item_id = ?");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['item_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
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
        $this->set_where("period = ? AND item_id = ?");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['item_id']['value']);

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
        $this->set_where("period = ? AND item_id = ? AND (period != '$orig_period' OR item_id != ?)");

        $bind_params = array('iii',
                             &$this->fields['period']['value'],
                             &$this->fields['item_id']['value'],
                             &$this->fields['item_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
