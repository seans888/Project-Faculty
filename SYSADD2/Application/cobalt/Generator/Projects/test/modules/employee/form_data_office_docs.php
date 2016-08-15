<?php
require 'components/get_listview_referrer.php';

require 'subclasses/office_docs.php';
$dbh_office_docs = new office_docs;
$dbh_office_docs->set_where("code_1='" . quote_smart($code_1) . "' AND code_2='" . quote_smart($code_2) . "' AND code_3='" . quote_smart($code_3) . "'");
if($result = $dbh_office_docs->make_query()->result)
{
    $data = $result->fetch_assoc();
    extract($data);

}

