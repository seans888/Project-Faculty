<?php
require 'subclasses/otevaluationitems_sst.php';
$sst = new otevaluationitems_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;