<?php
require_once 'employee_dd.php';
class employee extends data_abstraction
{
    var $fields = array();


    function __construct()
    {
        $this->fields     = employee_dd::load_dictionary();
        $this->relations  = employee_dd::load_relationships();
        $this->subclasses = employee_dd::load_subclass_info();
        $this->table_name = employee_dd::$table_name;
        $this->tables     = employee_dd::$table_name;
    }

    function add($param)
    {
        $this->set_parameters($param);

        if($this->stmt_template=='')
        {
            $this->set_query_type('INSERT');
            $this->set_fields('emp_id, emp_last_name, emp_first_name, emp_middle_name, email, emp_status, emp_group, address, postal_code, tel_num, mobile_num, hiring_date, resignation_date, gender, civil_status, birth_date, birth_place, religion, is_deleted, ATM_num, BDO_ATM_num, SSS_num, PhilHealth_num, TIN_num, PagIbig_num');
            $this->set_values("?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");

            $bind_params = array('sssssiissssssssssssssssss',
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['emp_last_name']['value'],
                                 &$this->fields['emp_first_name']['value'],
                                 &$this->fields['emp_middle_name']['value'],
                                 &$this->fields['email']['value'],
                                 &$this->fields['emp_status']['value'],
                                 &$this->fields['emp_group']['value'],
                                 &$this->fields['address']['value'],
                                 &$this->fields['postal_code']['value'],
                                 &$this->fields['tel_num']['value'],
                                 &$this->fields['mobile_num']['value'],
                                 &$this->fields['hiring_date']['value'],
                                 &$this->fields['resignation_date']['value'],
                                 &$this->fields['gender']['value'],
                                 &$this->fields['civil_status']['value'],
                                 &$this->fields['birth_date']['value'],
                                 &$this->fields['birth_place']['value'],
                                 &$this->fields['religion']['value'],
                                 &$this->fields['is_deleted']['value'],
                                 &$this->fields['ATM_num']['value'],
                                 &$this->fields['BDO_ATM_num']['value'],
                                 &$this->fields['SSS_num']['value'],
                                 &$this->fields['PhilHealth_num']['value'],
                                 &$this->fields['TIN_num']['value'],
                                 &$this->fields['PagIbig_num']['value']);

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
            $this->set_update("emp_id = ?, emp_last_name = ?, emp_first_name = ?, emp_middle_name = ?, email = ?, emp_status = ?, emp_group = ?, address = ?, postal_code = ?, tel_num = ?, mobile_num = ?, hiring_date = ?, resignation_date = ?, gender = ?, civil_status = ?, birth_date = ?, birth_place = ?, religion = ?, is_deleted = ?, ATM_num = ?, BDO_ATM_num = ?, SSS_num = ?, PhilHealth_num = ?, TIN_num = ?, PagIbig_num = ?");
            $this->set_where("emp_id = ?");

            $bind_params = array('sssssiisssssssssssssssssss',
                                 &$this->fields['emp_id']['value'],
                                 &$this->fields['emp_last_name']['value'],
                                 &$this->fields['emp_first_name']['value'],
                                 &$this->fields['emp_middle_name']['value'],
                                 &$this->fields['email']['value'],
                                 &$this->fields['emp_status']['value'],
                                 &$this->fields['emp_group']['value'],
                                 &$this->fields['address']['value'],
                                 &$this->fields['postal_code']['value'],
                                 &$this->fields['tel_num']['value'],
                                 &$this->fields['mobile_num']['value'],
                                 &$this->fields['hiring_date']['value'],
                                 &$this->fields['resignation_date']['value'],
                                 &$this->fields['gender']['value'],
                                 &$this->fields['civil_status']['value'],
                                 &$this->fields['birth_date']['value'],
                                 &$this->fields['birth_place']['value'],
                                 &$this->fields['religion']['value'],
                                 &$this->fields['is_deleted']['value'],
                                 &$this->fields['ATM_num']['value'],
                                 &$this->fields['BDO_ATM_num']['value'],
                                 &$this->fields['SSS_num']['value'],
                                 &$this->fields['PhilHealth_num']['value'],
                                 &$this->fields['TIN_num']['value'],
                                 &$this->fields['PagIbig_num']['value'],
                                 $param['orig_emp_id']);

            $this->stmt_prepare($bind_params);
        }
        $this->stmt_execute();

        return $this;
    }

    function delete($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("emp_id = ?");

        $bind_params = array('s',
                             &$this->fields['emp_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        return $this;
    }

    function delete_many($param)
    {
        $this->set_parameters($param);
        $this->set_query_type('DELETE');
        $this->set_where("emp_id = ?");

        $bind_params = array('s',
                             &$this->fields['emp_id']['value']);

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
        $this->set_where("emp_id = ?");

        $bind_params = array('s',
                             &$this->fields['emp_id']['value']);

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
        $this->set_where("emp_id = ? AND (emp_id != '$orig_emp_id')");

        $bind_params = array('s',
                             &$this->fields['emp_id']['value']);

        $this->stmt_prepare($bind_params);
        $this->stmt_execute();
        $this->stmt_close();

        if($this->num_rows > 0) $this->is_unique = FALSE;
        else $this->is_unique = TRUE;

        return $this;
    }
}
