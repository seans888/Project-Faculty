<?php
require 'subclasses/employee_awards_sst.php';
$sst = new employee_awards_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;