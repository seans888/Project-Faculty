<?php
require 'path.php';
init_cobalt();
require 'subclasses/otevaluationresults_doc.php';
$obj_doc = new otevaluationresults_doc;
$obj_doc->auto_doc();