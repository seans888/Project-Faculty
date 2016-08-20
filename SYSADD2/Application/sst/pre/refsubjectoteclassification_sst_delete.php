<?php
require 'subclasses/refsubjectoteclassification_sst.php';
$sst = new refsubjectoteclassification_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;