<?php
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(TRUE);

class AdminController extends Zend_Controller_Action
{
    private $session;

    public function init()
    {
        $this->session = new Zend_Session_Namespace('my_session');               
        $this->_helper->layout->assign('footer',$this->view->render('footer.phtml'));
        $this->view->assign('link','../css/default.css');
        $this->view->assign('img','../image/');
        $this->view->assign('js','../js/');
        logModel::debug("init");
    }
     public function adminAction()
    {
        logModel::log_debug("IndexAction");
    }      
    public function editAction()
    {
        $req=$this->getRequest();
        try{              
            $category = $this->session->table_type;
            logModel::debug($this->session->table_type);
        }catch(Exception $e){
            logModel::debug($e->getMessage());
        }
        $this->session->action_type = "update";
        $field = $req->getParam('field');
        $param = $req->getParam('param');

        $data = new dbModel();
        $this->view->record = $data->getRecordData($category,$field,$param);         
    }
    public  function listAction()
    {
        $req= $this->getRequest();       
        $this->session->table_type = $req->getParam('table_type');
        $this->session->edit_target = strpos($this->session->table_type,"page")?'page':'contents';
        $arr_exp_table_type = explode('_',$this->session->table_type);
        $this->session->category = $arr_exp_table_type[0];
        
        $data = new dbModel();                
        $this->view->dataSource = $data->getDataSource($this->session->table_type);
        logModel::debug("category::".$this->session->category
            ."  table_type::".$this->session->table_type
            ."  edit_target::".$this->session->edit_target);                
    }
    public function insertAction()
    {
        try
        {        
        $req= $this->getRequest();
        //$this->session = new Zend_Session_Namespace('my_session');
        $this->session->table_type = $req->getParam('table_type');
        $this->session->action_type = "insert";
        $data = new dbModel();                
        $this->view->dataSource = $data->getTableDefine($this->session->table_type);
        }
        catch(Exception $e)
        {
            logModel::debug($e->getMessage());
        }
    }
    public function confirmAction()
    {
        logModel::debug("confirmAction start");
        
        foreach ($_POST as $key => $value)
        {
           logModel::debug($key +"::"+$value);
           $this->session->dbdata->$key = $value;
        }
        
        if($this->session->action_type =="insert")
        {                        
            logModel::debug("action type  is insert ");
        }
        else if($this->session->action_type == "update")
        {
            logModel::debug("action type  is update ");
        }
        $upload = new uploadModel();
    }
    public function completeAction()
    {}
    public function layoutAction()
    {
        //$req= $this->getRequest();
        //$category_type = $req->getParam("category_type");
        logModel::debug('layout');
    }
    public function err401Action()
    {}
}