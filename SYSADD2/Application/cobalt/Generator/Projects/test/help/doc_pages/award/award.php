<?php
require 'path.php';
init_cobalt();
require 'subclasses/award_doc.php';
$obj_doc = new award_doc;
$obj_doc->auto_doc();