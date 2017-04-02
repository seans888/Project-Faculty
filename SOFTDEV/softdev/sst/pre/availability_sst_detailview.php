<?php
require 'subclasses/availability_sst.php';
$sst = new availability_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;