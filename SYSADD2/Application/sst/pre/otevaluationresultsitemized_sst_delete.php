<?php
require 'subclasses/otevaluationresultsitemized_sst.php';
$sst = new otevaluationresultsitemized_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;