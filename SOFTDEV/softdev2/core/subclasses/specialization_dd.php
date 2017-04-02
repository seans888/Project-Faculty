<?php
class specialization_dd
{
    static $table_name = 'specialization';
    static $readable_name = 'Specialization';

    static function load_dictionary()
    {
        $fields = array(
                    'specialization_id' => array('value'=>'',
                                          'nullable'=>FALSE,
                                          'data_type'=>'integer',
                                          'length'=>20,
                                          'required'=>FALSE,
                                          'attribute'=>'primary key',
                                          'control_type'=>'none',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Specialization ID',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>FALSE,
                                          'char_set_method'=>'generate_num_set',
                                          'char_set_allow_space'=>FALSE,
                                          'extra_chars_allowed'=>'-',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('','',''),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'center',
                                          'rpt_show_sum'=>TRUE),
                    'emp_id' => array('value'=>'',
                                          'nullable'=>FALSE,
                                          'data_type'=>'varchar',
                                          'length'=>10,
                                          'required'=>TRUE,
                                          'attribute'=>'foreign key',
                                          'control_type'=>'drop-down list',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Emp',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('','',''),
                                          'date_default'=>'',
                                          'list_type'=>'sql generated',
                                          'list_settings'=>array('query' => "SELECT employee.emp_id AS `Queried_emp_id`, employee.emp_first_name, employee.emp_middle_name, employee.emp_last_name FROM employee ORDER BY `emp_first_name`, `emp_middle_name`, `emp_last_name`",
                                                                     'list_value' => 'Queried_emp_id',
                                                                     'list_items' => array('emp_first_name', 'emp_middle_name', 'emp_last_name'),
                                                                     'list_separators' => array()),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'center',
                                          'rpt_show_sum'=>FALSE),
                    'specialization_master_id' => array('value'=>'',
                                          'nullable'=>FALSE,
                                          'data_type'=>'integer',
                                          'length'=>20,
                                          'required'=>TRUE,
                                          'attribute'=>'foreign key',
                                          'control_type'=>'drop-down list',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Specialization Master',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'generate_num_set',
                                          'char_set_allow_space'=>FALSE,
                                          'extra_chars_allowed'=>'-',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('','',''),
                                          'date_default'=>'',
                                          'list_type'=>'sql generated',
                                          'list_settings'=>array('query' => "SELECT specialization_master.specialization_master_id AS `Queried_specialization_master_id`, specialization_master.specialization_name FROM specialization_master ORDER BY `specialization_name`",
                                                                     'list_value' => 'Queried_specialization_master_id',
                                                                     'list_items' => array('specialization_name'),
                                                                     'list_separators' => array()),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'center',
                                          'rpt_show_sum'=>TRUE)
                       );
        return $fields;
    }

    static function load_relationships()
    {
        $relations = array(array('type'=>'1-1',
                                 'table'=>'employee',
                                 'alias'=>'',
                                 'link_parent'=>'emp_id',
                                 'link_child'=>'emp_id',
                                 'link_subtext'=>array('emp_first_name','emp_middle_name','emp_last_name'),
                                 'where_clause'=>''),
                           array('type'=>'1-1',
                                 'table'=>'specialization_master',
                                 'alias'=>'',
                                 'link_parent'=>'specialization_master_id',
                                 'link_child'=>'specialization_master_id',
                                 'link_subtext'=>array('specialization_name'),
                                 'where_clause'=>''),
                           array('type'=>'M-1',
                             'table'=>'specialization_master',
                             'alias'=>'',
                             'link_parent'=>'specialization_master_id',
                             'link_child'=>'specialization_master_id',
                             'minimum'=>1,
                             'where_clause'=>''),
                           array('type'=>'M-1',
                             'table'=>'employee',
                             'alias'=>'',
                             'link_parent'=>'emp_id',
                             'link_child'=>'emp_id',
                             'minimum'=>1,
                             'where_clause'=>''));

        return $relations;
    }

    static function load_subclass_info()
    {
        $subclasses = array('html_file'=>'specialization_html.php',
                            'html_class'=>'specialization_html',
                            'data_file'=>'specialization.php',
                            'data_class'=>'specialization');
        return $subclasses;
    }

}