<?php
require 'subclasses/otevaluationperiod_sst.php';
$sst = new otevaluationperiod_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;