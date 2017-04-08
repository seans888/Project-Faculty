<?php
class reftermperiod_dd
{
    static $table_name = 'reftermperiod';
    static $readable_name = 'Reftermperiod';

    static function load_dictionary()
    {
        $fields = array(
                    'term_id' => array('value'=>'',
                                          'nullable'=>FALSE,
                                          'data_type'=>'integer',
                                          'length'=>20,
                                          'required'=>TRUE,
                                          'attribute'=>'primary key',
                                          'control_type'=>'textbox',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Term ID',
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
                    'period' => array('value'=>'',
                                          'nullable'=>FALSE,
                                          'data_type'=>'varchar',
                                          'length'=>255,
                                          'required'=>TRUE,
                                          'attribute'=>'primary key',
                                          'control_type'=>'textbox',
                                          'size'=>'60',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Period',
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
                    'exam_start' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'date',
                                          'length'=>0,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'date controls',
                                          'size'=>'',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Exam Start',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('exam_start_year','exam_start_month','exam_start_day'),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'left',
                                          'rpt_show_sum'=>FALSE),
                    'exam_end' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'date',
                                          'length'=>0,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'date controls',
                                          'size'=>'',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Exam End',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('exam_end_year','exam_end_month','exam_end_day'),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'left',
                                          'rpt_show_sum'=>FALSE),
                    'faculty_evaluation_start' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'date',
                                          'length'=>0,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'date controls',
                                          'size'=>'',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Faculty Evaluation Start',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('faculty_evaluation_start_year','faculty_evaluation_start_month','faculty_evaluation_start_day'),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'left',
                                          'rpt_show_sum'=>FALSE),
                    'faculty_evaluation_end' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'date',
                                          'length'=>0,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'date controls',
                                          'size'=>'',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Faculty Evaluation End',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('faculty_evaluation_end_year','faculty_evaluation_end_month','faculty_evaluation_end_day'),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'left',
                                          'rpt_show_sum'=>FALSE),
                    'grade_submission_start' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'date',
                                          'length'=>0,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'date controls',
                                          'size'=>'',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Grade Submission Start',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>TRUE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('grade_submission_start_year','grade_submission_start_month','grade_submission_start_day'),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'left',
                                          'rpt_show_sum'=>FALSE),
                    'grade_submission_end' => array('value'=>'',
                                          'nullable'=>TRUE,
                                          'data_type'=>'date',
                                          'length'=>0,
                                          'required'=>TRUE,
                                          'attribute'=>'',
                                          'control_type'=>'date controls',
                                          'size'=>'',
                                          'drop_down_has_blank'=>TRUE,
                                          'label'=>'Grade Submission End',
                                          'extra'=>'',
                                          'companion'=>'',
                                          'in_listview'=>FALSE,
                                          'char_set_method'=>'',
                                          'char_set_allow_space'=>TRUE,
                                          'extra_chars_allowed'=>'',
                                          'allow_html_tags'=>FALSE,
                                          'trim'=>'trim',
                                          'valid_set'=>array(),
                                          'date_elements'=>array('grade_submission_end_year','grade_submission_end_month','grade_submission_end_day'),
                                          'date_default'=>'',
                                          'list_type'=>'',
                                          'list_settings'=>array(''),
                                          'rpt_in_report'=>TRUE,
                                          'rpt_column_format'=>'normal',
                                          'rpt_column_alignment'=>'left',
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
        $subclasses = array('html_file'=>'reftermperiod_html.php',
                            'html_class'=>'reftermperiod_html',
                            'data_file'=>'reftermperiod.php',
                            'data_class'=>'reftermperiod');
        return $subclasses;
    }

}