<?php
require 'subclasses/subject_sst.php';
$sst = new subject_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;