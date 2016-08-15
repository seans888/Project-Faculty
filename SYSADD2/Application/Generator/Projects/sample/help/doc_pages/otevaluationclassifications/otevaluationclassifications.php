<?php
require 'path.php';
init_cobalt();
require 'subclasses/otevaluationclassifications_doc.php';
$obj_doc = new otevaluationclassifications_doc;
$obj_doc->auto_doc();