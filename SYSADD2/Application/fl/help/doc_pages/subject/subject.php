<?php
require 'path.php';
init_cobalt();
require 'subclasses/subject_doc.php';
$obj_doc = new subject_doc;
$obj_doc->auto_doc();