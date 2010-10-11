<?php
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(TRUE);

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {        
     $this->view->assign('errortype', $this->_getParam('error_handler')->type);
    }
}