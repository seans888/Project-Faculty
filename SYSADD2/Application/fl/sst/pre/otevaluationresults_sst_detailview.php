<?php
require 'subclasses/otevaluationresults_sst.php';
$sst = new otevaluationresults_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;