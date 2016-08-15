<?php
require 'subclasses/otevaluationresultsgrouped_sst.php';
$sst = new otevaluationresultsgrouped_sst;
$sst->auto_test();
$sst_script = $sst->script;