<?php
require 'subclasses/employee_hobbies_sst.php';
$sst = new employee_hobbies_sst;
$sst->auto_test();
$sst_script = $sst->script;