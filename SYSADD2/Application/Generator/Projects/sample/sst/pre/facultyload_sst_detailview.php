<?php
require 'subclasses/facultyload_sst.php';
$sst = new facultyload_sst;
$sst->auto_test('detail_view');
$sst_script = $sst->script;