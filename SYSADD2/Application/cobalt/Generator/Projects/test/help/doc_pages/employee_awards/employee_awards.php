<?php
require 'path.php';
init_cobalt();
require 'subclasses/employee_awards_doc.php';
$obj_doc = new employee_awards_doc;
$obj_doc->auto_doc();