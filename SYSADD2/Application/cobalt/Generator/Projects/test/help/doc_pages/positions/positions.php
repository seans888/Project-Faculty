<?php
require 'path.php';
init_cobalt();
require 'subclasses/positions_doc.php';
$obj_doc = new positions_doc;
$obj_doc->auto_doc();