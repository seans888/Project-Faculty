<?php
require 'subclasses/otevaluationresultsgrouped_sst.php';
$sst = new otevaluationresultsgrouped_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;