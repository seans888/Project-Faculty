<?php
require 'subclasses/otevaluationperiod_sst.php';
$sst = new otevaluationperiod_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;