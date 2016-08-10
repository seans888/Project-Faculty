<?php
require 'path.php';
init_cobalt();
require 'subclasses/facultyload_doc.php';
$obj_doc = new facultyload_doc;
$obj_doc->auto_doc();