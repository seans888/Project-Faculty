<?php
require 'path.php';
init_cobalt();
require 'subclasses/specialization_doc.php';
$obj_doc = new specialization_doc;
$obj_doc->auto_doc();