<?php
require 'subclasses/facultyload_sst.php';
$sst = new facultyload_sst;
$sst->auto_test();
$sst_script = $sst->script;