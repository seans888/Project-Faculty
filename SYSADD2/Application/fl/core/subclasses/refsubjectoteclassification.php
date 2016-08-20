<?php
require_once 'refsubjectoteclassification_dd.php';
class refsubjectoteclassification extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = refsubjectoteclassification_dd::load_dictionary();
        $this->relations  = refsubjectoteclassification_dd::load_relationships();
        $this->subclasses = refsubjectoteclassification_dd::load_subclass_info();
        $this->table_name = refsubjectoteclassification_dd::$table_name;
        $this->tables     = refsubjectoteclassification_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('period, subject_id, class_id');
            $this->set_values("?,?,?");

            $bind_params = array('iii',
                                 &$this->fields['period']['value'],
                                 &$this->fields['subject_id']['value'],
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
            $this->set_update("period = ?, subject_id = ?, class_id = ?");
            $this->set_where("period = ? AND subject_id = ?");

            $bind_params = array('iiiii',
                                 &$this->fields['period']['value'],
                                 &$this->fields['subject_id']['value'],
                                 &$this->fields['class_id']['value'],
                                 $param['orig_period'],
                                 $param['orig_subject_id']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND subject_id = ?");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['subject_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("period = ? AND subject_id = ?");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['subject_id']['value']);

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
        $this->set_where("period = ? AND subject_id = ?");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['subject_id']['value']);

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
        $this->set_where("period = ? AND subject_id = ? AND (period != '$orig_period' OR subject_id != '$orig_subject_id')");

        $bind_params = array('ii',
                             &$this->fields['period']['value'],
                             &$this->fields['subject_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
