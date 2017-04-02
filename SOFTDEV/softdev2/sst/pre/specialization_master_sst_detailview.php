<?php
require 'subclasses/specialization_master_sst.php';
$sst = new specialization_master_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;