<?php
require 'subclasses/experiments_sst.php';
$sst = new experiments_sst;
$sst->auto_test();
$sst_script = $sst->script;