<?php
require 'subclasses/otevaluationclassifications_sst.php';
$sst = new otevaluationclassifications_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;