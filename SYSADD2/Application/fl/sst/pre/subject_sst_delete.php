<?php
require 'subclasses/subject_sst.php';
$sst = new subject_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;