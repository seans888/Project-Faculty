<?php
require_once 'otevaluationresultsitemized_dd.php';
class otevaluationresultsitemized extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = otevaluationresultsitemized_dd::load_dictionary();
        $this->relations  = otevaluationresultsitemized_dd::load_relationships();
        $this->subclasses = otevaluationresultsitemized_dd::load_subclass_info();
        $this->table_name = otevaluationresultsitemized_dd::$table_name;
        $this->tables     = otevaluationresultsitemized_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('period, target_id, item_id, subject_code, section, grade, evaluators');
            $this->set_values("?,?,?,?,?,?,?");

            $bind_params = array('isissis',
                                 &$this->fields['period']['value'],
                                 &$this->fields['target_id']['value'],
                                 &$this->fields['item_id']['value'],
                                 &$this->fields['subject_code']['value'],
                                 &$this->fields['section']['value'],
                                 &$this->fields['grade']['value'],
                                 &$this->fields['evaluators']['value']);

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
            $this->set_update("period = ?, target_id = ?, item_id = ?, subject_code = ?, section = ?, grade = ?, evaluators = ?");
            $this->set_where("period = ? AND target_id = ? AND item_id = ? AND subject_code = ? AND section = ?");

            $bind_params = array('isissisisiss',
                                 &$this->fields['period']['value'],
                                 &$this->fields['target_id']['value'],
                                 &$this->fields['item_id']['value'],
                                 &$this->fields['subject_code']['value'],
                                 &$this->fields['section']['value'],
                                 &$this->fields['grade']['value'],
                                 &$this->fields['evaluators']['value'],
                                 $param['orig_period'],
                                 $param['orig_target_id'],
                                 $param['orig_item_id'],
                                 $param['orig_subject_code'],
                                 $param['orig_section']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND target_id = ? AND item_id = ? AND subject_code = ? AND section = ?");

        $bind_params = array('isiss',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['item_id']['value'],
                             &$this->fields['subject_code']['value'],
                             &$this->fields['section']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND target_id = ? AND item_id = ? AND subject_code = ? AND section = ?");

        $bind_params = array('isiss',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['item_id']['value'],
                             &$this->fields['subject_code']['value'],
                             &$this->fields['section']['value']);

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
        $this->set_where("period = ? AND target_id = ? AND item_id = ? AND subject_code = ? AND section = ?");

        $bind_params = array('isiss',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['item_id']['value'],
                             &$this->fields['subject_code']['value'],
                             &$this->fields['section']['value']);

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
        $this->set_where("period = ? AND target_id = ? AND item_id = ? AND subject_code = ? AND section = ? AND (period != '$orig_period' OR target_id != '$orig_target_id' OR item_id != '$orig_item_id' OR subject_code != '$orig_subject_code' OR section != '$orig_section')");

        $bind_params = array('isiss',
                             &$this->fields['period']['value'],
                             &$this->fields['target_id']['value'],
                             &$this->fields['item_id']['value'],
                             &$this->fields['subject_code']['value'],
                             &$this->fields['section']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
