<?php
require 'subclasses/specialization_sst.php';
$sst = new specialization_sst;
$sst->auto_test();
$sst_script = $sst->script;