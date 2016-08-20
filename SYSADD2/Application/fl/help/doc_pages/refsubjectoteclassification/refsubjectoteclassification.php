<?php
require 'path.php';
init_cobalt();
require 'subclasses/refsubjectoteclassification_doc.php';
$obj_doc = new refsubjectoteclassification_doc;
$obj_doc->auto_doc();