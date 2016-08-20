<?php
require_once 'subject_dd.php';
class subject extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = subject_dd::load_dictionary();
        $this->relations  = subject_dd::load_relationships();
        $this->subclasses = subject_dd::load_subclass_info();
        $this->table_name = subject_dd::$table_name;
        $this->tables     = subject_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('subject_id, term_id, subject_code, subject_name, subject_description, unit, pay_unit, compute_GPA, lab_id, group_owner, evaluate_OTE, is_elective, grade_type, accept_substitute, lab_type_id, dept_id, category, assess_note');
            $this->set_values("?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");

            $bind_params = array('iisssssssssssssiis',
                                 &$this->fields['subject_id']['value'],
                                 &$this->fields['term_id']['value'],
                                 &$this->fields['subject_code']['value'],
                                 &$this->fields['subject_name']['value'],
                                 &$this->fields['subject_description']['value'],
                                 &$this->fields['unit']['value'],
                                 &$this->fields['pay_unit']['value'],
                                 &$this->fields['compute_GPA']['value'],
                                 &$this->fields['lab_id']['value'],
                                 &$this->fields['group_owner']['value'],
                                 &$this->fields['evaluate_OTE']['value'],
                                 &$this->fields['is_elective']['value'],
                                 &$this->fields['grade_type']['value'],
                                 &$this->fields['accept_substitute']['value'],
                                 &$this->fields['lab_type_id']['value'],
                                 &$this->fields['dept_id']['value'],
                                 &$this->fields['category']['value'],
                                 &$this->fields['assess_note']['value']);

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
            $this->set_update("term_id = ?, subject_code = ?, subject_name = ?, subject_description = ?, unit = ?, pay_unit = ?, compute_GPA = ?, lab_id = ?, group_owner = ?, evaluate_OTE = ?, is_elective = ?, grade_type = ?, accept_substitute = ?, lab_type_id = ?, dept_id = ?, category = ?, assess_note = ?");
            $this->set_where("subject_id = ?");

            $bind_params = array('isssssssssssssiisi',
                                 &$this->fields['term_id']['value'],
                                 &$this->fields['subject_code']['value'],
                                 &$this->fields['subject_name']['value'],
                                 &$this->fields['subject_description']['value'],
                                 &$this->fields['unit']['value'],
                                 &$this->fields['pay_unit']['value'],
                                 &$this->fields['compute_GPA']['value'],
                                 &$this->fields['lab_id']['value'],
                                 &$this->fields['group_owner']['value'],
                                 &$this->fields['evaluate_OTE']['value'],
                                 &$this->fields['is_elective']['value'],
                                 &$this->fields['grade_type']['value'],
                                 &$this->fields['accept_substitute']['value'],
                                 &$this->fields['lab_type_id']['value'],
                                 &$this->fields['dept_id']['value'],
                                 &$this->fields['category']['value'],
                                 &$this->fields['assess_note']['value'],
                                 &$this->fields['subject_id']['value']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("subject_id = ?");

        $bind_params = array('i',
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
        $this->set_where("subject_id = ?");

        $bind_params = array('i',
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


        $this->set_query_type('SELECT');
        $this->set_where("subject_id = ? AND (subject_id != ?)");

        $bind_params = array('ii',
                             &$this->fields['subject_id']['value'],
                             &$this->fields['subject_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
