<?php
require 'path.php';
init_cobalt();
require 'subclasses/otevaluationratings_doc.php';
$obj_doc = new otevaluationratings_doc;
$obj_doc->auto_doc();