<?php
require 'subclasses/otevaluationresultspersection_sst.php';
$sst = new otevaluationresultspersection_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;