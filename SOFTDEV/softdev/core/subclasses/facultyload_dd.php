<?php
class facultyload_dd
{
    static $table_name = 'facultyload';
    static $readable_name = 'Facultyload';

    static function load_dictionary()
    {
        $fields = array(
                    'load_id' => array('value'=>'',
                                          'nullable'=>FALSE,
                                          'data_type'=>'integer',
                                          'length'=>20,
                                          'required'=>FALSE,
                                          'attribute'=>'primary key',
                                          'control_type'=>'none',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Load ID',
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
                                          'list_settings'=>array('query' => "SELECT employee.emp_id AS `Queried_emp_id`, employee.emp_first_name, employee.emp_last_name, employee.emp_middle_name FROM employee ORDER BY `emp_first_name`, `emp_last_name`, `emp_middle_name`",
                                                                     'list_value' => 'Queried_emp_id',
                                                                     'list_items' => array('emp_first_name', 'emp_last_name', 'emp_middle_name'),
                                                                     'list_separators' => array()),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'center',
                                          'rpt_show_sum'=>FALSE),
                    'subject_offering_id' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'integer',
                                          'length'=>20,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'textbox',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Subject Offering ID',
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
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'center',
                                          'rpt_show_sum'=>TRUE),
                    'date' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'integer',
                                          'length'=>20,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'textbox',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Date',
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
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'number_format2',
                                          'rpt_column_alignment'=>'right',
                                          'rpt_show_sum'=>TRUE)
                       );
        return $fields;
    }

    static function load_relationships()
    {
        $relations = array(array('type'=>'1-M',
                                 'table'=>'refsubjectofferinghdr',
                                 'link_parent'=>'load_id',
                                 'link_child'=>'load_id',
                                 'where_clause'=>''),
                           array('type'=>'1-1',
                                 'table'=>'employee',
                                 'alias'=>'',
                                 'link_parent'=>'emp_id',
                                 'link_child'=>'emp_id',
                                 'link_subtext'=>array('emp_first_name','emp_last_name','emp_middle_name'),
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
        $subclasses = array('html_file'=>'facultyload_html.php',
                            'html_class'=>'facultyload_html',
                            'data_file'=>'facultyload.php',
                            'data_class'=>'facultyload');
        return $subclasses;
    }

}