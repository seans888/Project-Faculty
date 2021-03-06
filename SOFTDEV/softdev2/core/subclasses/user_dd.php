<?php
class user_dd
{
    static $table_name = 'user';
    static $readable_name = 'User';

    static function load_dictionary()
    {
        $fields = array(
                        'username' => array('value'=>'',
                                              'data_type'=>'varchar',
                                              'length'=>255,
                                              'required'=>TRUE,
                                              'attribute'=>'primary key',
                                              'control_type'=>'textbox',
                                              'size'=>60,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Username',
                                              'extra'=>'autocomplete="off"',
                                              'in_listview'=>TRUE,
                                              'char_set_method'=>'',
                                              'char_set_allow_space'=>TRUE,
                                              'extra_chars_allowed'=>'',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'',
                                              'list_settings'=>array(''),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                        'password' => array('value'=>'',
                                              'data_type'=>'varchar',
                                              'length'=>MAX_PASSWORD_LENGTH,
                                              'required'=>FALSE,
                                              'attribute'=>'',
                                              'control_type'=>'none',
                                              'size'=>60,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Password',
                                              'extra'=>'autocomplete="off"',
                                              'in_listview'=>FALSE,
                                              'char_set_method'=>'',
                                              'char_set_allow_space'=>TRUE,
                                              'extra_chars_allowed'=>'',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'',
                                              'list_settings'=>array(''),
                                              'rpt_in_report'=>FALSE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                        'salt' => array('value'=>'',
                                              'data_type'=>'varchar',
                                              'length'=>255,
                                              'required'=>FALSE,
                                              'attribute'=>'',
                                              'control_type'=>'none',
                                              'size'=>60,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Salt',
                                              'extra'=>'',
                                              'in_listview'=>FALSE,
                                              'char_set_method'=>'',
                                              'char_set_allow_space'=>TRUE,
                                              'extra_chars_allowed'=>'',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'',
                                              'list_settings'=>array(''),
                                              'rpt_in_report'=>FALSE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                        'iteration' => array('value'=>'',
                                              'data_type'=>'integer',
                                              'length'=>11,
                                              'required'=>FALSE,
                                              'attribute'=>'',
                                              'control_type'=>'none',
                                              'size'=>60,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Iteration',
                                              'extra'=>'',
                                              'in_listview'=>FALSE,
                                              'char_set_method'=>'generate_num_set',
                                              'char_set_allow_space'=>FALSE,
                                              'extra_chars_allowed'=>'-',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'',
                                              'list_settings'=>array(''),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                        'method' => array('value'=>'',
                                              'data_type'=>'varchar',
                                              'length'=>255,
                                              'required'=>FALSE,
                                              'attribute'=>'',
                                              'control_type'=>'none',
                                              'size'=>60,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Method',
                                              'extra'=>'',
                                              'in_listview'=>FALSE,
                                              'char_set_method'=>'',
                                              'char_set_allow_space'=>TRUE,
                                              'extra_chars_allowed'=>'',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'',
                                              'list_settings'=>array(''),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                        'person_id' => array('value'=>'',
                                              'data_type'=>'integer',
                                              'length'=>11,
                                              'required'=>TRUE,
                                              'attribute'=>'foreign key',
                                              'control_type'=>'drop-down list',
                                              'size'=>0,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Person',
                                              'extra'=>'',
                                              'in_listview'=>TRUE,
                                              'char_set_method'=>'generate_num_set',
                                              'char_set_allow_space'=>FALSE,
                                              'extra_chars_allowed'=>'-',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'sql generated',
                                              'list_settings'=>array('query' => "SELECT person.person_id AS `Queried_person_id`, person.first_name, person.middle_name, person.last_name FROM person ORDER BY person.last_name, person.first_name, person.middle_name",
                                                                     'list_value' => 'Queried_person_id',
                                                                     'list_items' => array('last_name', 'first_name', 'middle_name'),
                                                                     'list_separators' => array(', ')),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'right',
                                              'rpt_show_sum'=>FALSE),
                        'role_id' => array('value'=>'',
                                              'data_type'=>'integer',
                                              'length'=>11,
                                              'required'=>FALSE,
                                              'attribute'=>'foreign key',
                                              'control_type'=>'drop-down list',
                                              'size'=>0,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Role',
                                              'extra'=>'',
                                              'in_listview'=>TRUE,
                                              'char_set_method'=>'generate_num_set',
                                              'char_set_allow_space'=>FALSE,
                                              'extra_chars_allowed'=>'-',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'sql generated',
                                              'list_settings'=>array('query' => "SELECT user_role.role_id AS `Queried_role_id`, user_role.role FROM user_role ORDER BY user_role.role",
                                                                     'list_value' => 'Queried_role_id',
                                                                     'list_items' => array('role'),
                                                                     'list_separators' => array()),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'right',
                                              'rpt_show_sum'=>FALSE),
                        'skin_id' => array('value'=>'',
                                              'data_type'=>'integer',
                                              'length'=>11,
                                              'required'=>TRUE,
                                              'attribute'=>'foreign key',
                                              'control_type'=>'drop-down list',
                                              'size'=>0,
                                              'drop_down_has_blank'=>TRUE,
                                              'label'=>'Skin',
                                              'extra'=>'',
                                              'in_listview'=>TRUE,
                                              'char_set_method'=>'generate_num_set',
                                              'char_set_allow_space'=>FALSE,
                                              'extra_chars_allowed'=>'-',
                                              'allow_html_tags'=>FALSE,
                                              'trim'=>'trim',
                                              'valid_set'=>array(),
                                              'date_elements'=>array('','',''),
                                              'book_list_generator'=>'',
                                              'list_type'=>'sql generated',
                                              'list_settings'=>array('query' => "SELECT system_skins.skin_id AS `Queried_skin_id`, system_skins.skin_name FROM system_skins ORDER BY system_skins.skin_name",
                                                                     'list_value' => 'Queried_skin_id',
                                                                     'list_items' => array('skin_name'),
                                                                     'list_separators' => array()),
                                              'rpt_in_report'=>TRUE,
                                              'rpt_column_format'=>'normal',
                                              'rpt_column_alignment'=>'left',
                                              'rpt_show_sum'=>FALSE),
                       );
        return $fields;
    }

    static function load_relationships()
    {
        $relations = array('1'=>array('type'=>'1-1',
                                      'table'=>'person',
                                      'link_parent'=>'person_id',
                                      'link_child'=>'person_id',
                                      'link_subtext'=>array('last_name','first_name','middle_name'),
                                      'where_clause'=>''),
                           '2'=>array('type'=>'1-1',
                                      'table'=>'system_skins',
                                      'link_parent'=>'skin_id',
                                      'link_child'=>'skin_id',
                                      'link_subtext'=>array('skin_name'),
                                      'where_clause'=>''),
                           '3'=>array('type'=>'1-1',
                                      'table'=>'user_role',
                                      'link_parent'=>'role_id',
                                      'link_child'=>'role_id',
                                      'link_subtext'=>array('role'),
                                      'where_clause'=>''));

        return $relations;
    }

    static function load_subclass_info()
    {
        $subclasses = array('html_file'=>'user_html.php',
                            'html_class'=>'user_html',
                            'data_file'=>'user.php',
                            'data_class'=>'user');
        return $subclasses;
    }

}
