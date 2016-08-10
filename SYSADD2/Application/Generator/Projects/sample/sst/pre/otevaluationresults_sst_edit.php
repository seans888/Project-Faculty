<?php
require 'subclasses/otevaluationresults_sst.php';
$sst = new otevaluationresults_sst;
$sst->auto_test();
$sst_script = $sst->script;