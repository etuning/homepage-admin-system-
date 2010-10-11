<?php
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(TRUE);

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->layout->assign('footer',$this->view->render('footer.phtml'));
        $this->view->assign('link','../css/default.css');
        $this->view->assign('img','../image/');
        $this->view->assign('js','../js/');
        logModel::debug("init");
    }
    public function indexAction()
    {
        logModel::debug("IndexAction");
    }
    public function err401Action()
    {}
}