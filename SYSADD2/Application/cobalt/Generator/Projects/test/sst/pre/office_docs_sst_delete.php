<?php
require 'subclasses/office_docs_sst.php';
$sst = new office_docs_sst;
$sst->auto_test('delete');
$sst_script = $sst->script;