<?php
require_once 'otevaluationresults_dd.php';
class otevaluationresults extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = otevaluationresults_dd::load_dictionary();
        $this->relations  = otevaluationresults_dd::load_relationships();
        $this->subclasses = otevaluationresults_dd::load_subclass_info();
        $this->table_name = otevaluationresults_dd::$table_name;
        $this->tables     = otevaluationresults_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('period, target_id, grade, class_id');
            $this->set_values("?,?,?,?");

            $bind_params = array('issi',
                                 &$this->fields['period']['value'],
                                 &$this->fields['target_id']['value'],
                                 &$this->fields['grade']['value'],
                                 &$this->fields['class_id']['value']);

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
            $this->set_update("period = ?, target_id = ?, grade = ?, class_id = ?");
            $this->set_where("period = ? AND target_id = ? AND class_id = ?");

            $bind_params = array('issiisi',
                                 &$this->fields['period']['value'],
                                 &$this->fields['target_id']['value'],
                                 &$this->fields['grade']['value'],
                                 &$this->fields['class_id']['value'],
                                 $param['orig_period'],
                                 $param['orig_target_id'],
                                 $param['orig_class_id']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND target_id = ? AND class_id = ?");

        $bind_params = array('isi',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['class_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND target_id = ? AND class_id = ?");

        $bind_params = array('isi',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['class_id']['value']);

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
        $this->set_where("period = ? AND target_id = ? AND class_id = ?");

        $bind_params = array('isi',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['class_id']['value']);

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
        $this->set_where("period = ? AND target_id = ? AND class_id = ? AND (period != '$orig_period' OR target_id != '$orig_target_id' OR class_id != '$orig_class_id')");

        $bind_params = array('isi',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['class_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
