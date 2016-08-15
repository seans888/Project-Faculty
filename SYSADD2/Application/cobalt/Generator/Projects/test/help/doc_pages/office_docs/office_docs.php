<?php
require 'path.php';
init_cobalt();
require 'subclasses/office_docs_doc.php';
$obj_doc = new office_docs_doc;
$obj_doc->auto_doc();