<?php
require 'subclasses/otevaluationratings_sst.php';
$sst = new otevaluationratings_sst;
$sst->auto_test();
$sst_script = $sst->script;