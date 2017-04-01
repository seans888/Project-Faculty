<?php
require 'components/get_listview_referrer.php';

require 'subclasses/subject.php';
$dbh_subject = new subject;
$dbh_subject->set_where("subject_id='" . quote_smart($subject_id) . "'");
if($result = $dbh_subject->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

