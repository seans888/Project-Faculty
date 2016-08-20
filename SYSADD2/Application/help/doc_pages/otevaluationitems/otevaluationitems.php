<?php
require 'path.php';
init_cobalt();
require 'subclasses/otevaluationitems_doc.php';
$obj_doc = new otevaluationitems_doc;
$obj_doc->auto_doc();