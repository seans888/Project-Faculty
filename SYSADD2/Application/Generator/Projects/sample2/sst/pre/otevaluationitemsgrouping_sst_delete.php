<?php
require 'subclasses/otevaluationitemsgrouping_sst.php';
$sst = new otevaluationitemsgrouping_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;