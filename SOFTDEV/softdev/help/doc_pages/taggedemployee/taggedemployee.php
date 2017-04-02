<?php
require 'path.php';
init_cobalt();
require 'subclasses/taggedemployee_doc.php';
$obj_doc = new taggedemployee_doc;
$obj_doc->auto_doc();