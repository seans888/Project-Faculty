<?php
require 'path.php';
init_cobalt();
require 'subclasses/experiments_doc.php';
$obj_doc = new experiments_doc;
$obj_doc->auto_doc();