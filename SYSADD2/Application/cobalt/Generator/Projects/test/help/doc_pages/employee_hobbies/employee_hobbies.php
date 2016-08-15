<?php
require 'path.php';
init_cobalt();
require 'subclasses/employee_hobbies_doc.php';
$obj_doc = new employee_hobbies_doc;
$obj_doc->auto_doc();