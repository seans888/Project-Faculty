<?php
require 'subclasses/award_sst.php';
$sst = new award_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;