<?php
require 'path.php';
init_cobalt();
require 'subclasses/availability_doc.php';
$obj_doc = new availability_doc;
$obj_doc->auto_doc();