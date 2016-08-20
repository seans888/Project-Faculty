<?php
require 'subclasses/otevaluationclassifications_sst.php';
$sst = new otevaluationclassifications_sst;
$sst->auto_test();
$sst_script = $sst->script;