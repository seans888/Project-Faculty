<?php
require 'subclasses/positions_sst.php';
$sst = new positions_sst;
$sst->auto_test();
$sst_script = $sst->script;