<?php
class otevaluationitemsgrouping_dd
{
    static $table_name = 'otevaluationitemsgrouping';
    static $readable_name = 'Otevaluationitemsgrouping';

    static function load_dictionary()
    {
        $fields = array(
                        'group_id' => array('value'=>'',
                                              'nullable'=>FALSE,
                                              'data_type'=>'integer',
                                              'length'=>4,
                                              'required'=>FALSE,
                                              'attribute'=>'primary key',
                                              'control_type'=>'none',
                                              'size'=>0,
                                              'upload_path'=>'',
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Group ID',
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
                                              'rpt_show_sum'=>FALSE),
                        'group_name' => array('value'=>'',
                                              'nullable'=>FALSE,
                                              'data_type'=>'varchar',
                                              'length'=>50000,
                                              'required'=>TRUE,
                                              'attribute'=>'',
                                              'control_type'=>'textbox',
                                              'size'=>60,
                                              'upload_path'=>'',
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Group Name',
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
                                              'list_type'=>'',
                                              'list_settings'=>array(''),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                        'weight' => array('value'=>'',
                                              'nullable'=>FALSE,
                                              'data_type'=>'integer',
                                              'length'=>4,
                                              'required'=>TRUE,
                                              'attribute'=>'',
                                              'control_type'=>'textbox',
                                              'size'=>60,
                                              'upload_path'=>'',
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Weight',
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
                                              'rpt_show_sum'=>TRUE),
                        'class_id' => array('value'=>'',
                                              'nullable'=>TRUE,
                                              'data_type'=>'integer',
                                              'length'=>11,
                                              'required'=>TRUE,
                                              'attribute'=>'',
                                              'control_type'=>'textbox',
                                              'size'=>60,
                                              'upload_path'=>'',
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Class ID',
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
                                              'rpt_show_sum'=>FALSE)
                       );
        return $fields;
    }

    static function load_relationships()
    {
        $relations = array();

        return $relations;
    }

    static function load_subclass_info()
    {
        $subclasses = array('html_file'=>'otevaluationitemsgrouping_html.php',
                            'html_class'=>'otevaluationitemsgrouping_html',
                            'data_file'=>'otevaluationitemsgrouping.php',
                            'data_class'=>'otevaluationitemsgrouping');
        return $subclasses;
    }

}