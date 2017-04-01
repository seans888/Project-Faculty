<?php
require 'subclasses/taggedemployee_sst.php';
$sst = new taggedemployee_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;