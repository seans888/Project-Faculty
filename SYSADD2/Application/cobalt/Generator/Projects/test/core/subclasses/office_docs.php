<?php
require_once 'office_docs_dd.php';
class office_docs extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = office_docs_dd::load_dictionary();
        $this->relations  = office_docs_dd::load_relationships();
        $this->subclasses = office_docs_dd::load_subclass_info();
        $this->table_name = office_docs_dd::$table_name;
        $this->tables     = office_docs_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('code_1, code_2, code_3, title, description, file_upload');
            $this->set_values("?,?,?,?,?,?");

            $bind_params = array('ssssss',
                                 &$this->fields['code_1']['value'],
                                 &$this->fields['code_2']['value'],
                                 &$this->fields['code_3']['value'],
                                 &$this->fields['title']['value'],
                                 &$this->fields['description']['value'],
                                 &$this->fields['file_upload']['value']);

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
            $this->set_update("code_1 = ?, code_2 = ?, code_3 = ?, title = ?, description = ?, file_upload = ?");
            $this->set_where("code_1 = ? AND code_2 = ? AND code_3 = ?");

            $bind_params = array('sssssssss',
                                 &$this->fields['code_1']['value'],
                                 &$this->fields['code_2']['value'],
                                 &$this->fields['code_3']['value'],
                                 &$this->fields['title']['value'],
                                 &$this->fields['description']['value'],
                                 &$this->fields['file_upload']['value'],
                                 $param['orig_code_1'],
                                 $param['orig_code_2'],
                                 $param['orig_code_3']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("code_1 = ? AND code_2 = ? AND code_3 = ?");

        $bind_params = array('sss',
                             &$this->fields['code_1']['value'],
                             &$this->fields['code_2']['value'],
                             &$this->fields['code_3']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("code_1 = ? AND code_2 = ? AND code_3 = ?");

        $bind_params = array('sss',
                             &$this->fields['code_1']['value'],
                             &$this->fields['code_2']['value'],
                             &$this->fields['code_3']['value']);

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
        $this->set_where("code_1 = ? AND code_2 = ? AND code_3 = ?");

        $bind_params = array('sss',
                             &$this->fields['code_1']['value'],
                             &$this->fields['code_2']['value'],
                             &$this->fields['code_3']['value']);

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
        $this->set_where("code_1 = ? AND code_2 = ? AND code_3 = ? AND (code_1 != '$orig_code_1' OR code_2 != '$orig_code_2' OR code_3 != '$orig_code_3')");

        $bind_params = array('sss',
                             &$this->fields['code_1']['value'],
                             &$this->fields['code_2']['value'],
                             &$this->fields['code_3']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
