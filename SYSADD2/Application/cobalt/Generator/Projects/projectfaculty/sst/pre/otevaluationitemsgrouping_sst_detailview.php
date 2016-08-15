<?php
require 'subclasses/otevaluationitemsgrouping_sst.php';
$sst = new otevaluationitemsgrouping_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;