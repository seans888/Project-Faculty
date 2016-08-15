<?php
require 'subclasses/salary_grade_sst.php';
$sst = new salary_grade_sst;
$sst->auto_test();
$sst_script = $sst->script;