<?php
require 'components/get_listview_referrer.php';

require 'subclasses/facultyload.php';
$dbh_facultyload = new facultyload;
$dbh_facultyload->set_where("load_id='" . quote_smart($load_id) . "'");
if($result = $dbh_facultyload->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

require_once 'subclasses/refsubjectofferinghdr.php';
$dbh_refsubjectofferinghdr = new refsubjectofferinghdr;
$dbh_refsubjectofferinghdr->set_fields('term_id, subject_id, section, subject_code, emp_id');
$dbh_refsubjectofferinghdr->set_where("load_id='" . quote_smart($load_id) . "'");
if($result = $dbh_refsubjectofferinghdr->make_query()->result)
{
    $num_refsubjectofferinghdr = $dbh_refsubjectofferinghdr->num_rows;
    for($a=0; $a<$num_refsubjectofferinghdr; $a++)
    {
        $data = $result->fetch_row();
        $cf_refsubjectofferinghdr_term_id[$a] = $data[0];
        $cf_refsubjectofferinghdr_subject_id[$a] = $data[1];
        $cf_refsubjectofferinghdr_section[$a] = $data[2];
        $cf_refsubjectofferinghdr_subject_code[$a] = $data[3];
        $cf_refsubjectofferinghdr_emp_id[$a] = $data[4];
    }
}

