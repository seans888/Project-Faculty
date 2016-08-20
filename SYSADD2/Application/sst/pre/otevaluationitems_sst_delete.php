<?php
require 'subclasses/otevaluationitems_sst.php';
$sst = new otevaluationitems_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;