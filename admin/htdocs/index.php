<?php
$path = "C:/xampp/htdocs/TomWebPj/WebContent/admin/library";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
$path = "C:/xampp/htdocs/TomWebPj/WebContent/admin/application/models";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
$inc_path = get_include_path();
require_once 'Zend/Layout.php';
Zend_Layout::startMvc(array('layoutPath' => '../application/views/layouts/'));
require_once "Zend/Controller/Front.php";
Zend_Controller_Front::run("../application/controllers");