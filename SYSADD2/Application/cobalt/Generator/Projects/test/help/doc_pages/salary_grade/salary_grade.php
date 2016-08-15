<?php
require 'path.php';
init_cobalt();
require 'subclasses/salary_grade_doc.php';
$obj_doc = new salary_grade_doc;
$obj_doc->auto_doc();