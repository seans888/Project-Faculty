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

