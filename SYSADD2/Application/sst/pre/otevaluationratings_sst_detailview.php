<?php
require 'subclasses/otevaluationratings_sst.php';
$sst = new otevaluationratings_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;