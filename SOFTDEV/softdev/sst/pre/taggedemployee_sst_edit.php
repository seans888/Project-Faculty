<?php
require 'subclasses/taggedemployee_sst.php';
$sst = new taggedemployee_sst;
$sst->auto_test();
$sst_script = $sst->script;