<?php
require 'subclasses/otevaluationresultsitemized_sst.php';
$sst = new otevaluationresultsitemized_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;