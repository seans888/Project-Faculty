<?php
require 'path.php';
init_cobalt();
require 'subclasses/otevaluationperiod_doc.php';
$obj_doc = new otevaluationperiod_doc;
$obj_doc->auto_doc();