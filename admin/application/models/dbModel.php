<?php
/**
 * Description of dbModel
 * @author yukihiro
 */
class dbModel
{    
    private $_db;
    /**
     * コンストラクタ
     */
    function  __construct()
    {       
        $config  = new Zend_Config_Ini('../application/config/db_info.ini','db_config');
        $this->_db = Zend_Db::factory($config->db);
        $this->_db->getConnection();
        $this->_db->query("SET NAMES 'UTF8'") or die('can not SET NAMES '.$config->db->adapter);
    }
    /**
     *データソース取得
     * @param <type> $req
     * @return <type> DataSource
     */
    public function getDataSource($tablename)
    {                     
        try{            
            return $this->_db->fetchAll("SELECT * FROM $tablename");
        }
        catch (Exception $e)
        {
            logModel::debug($e->getMessage());
        }        
    }
    /**
     *ワンレコードを返す
     * @param <type> $category
     * @param <type> $param 
     */
    public function getRecordData($tablename,$field,$param)
    {
        try{
            return $this->_db->fetchAll("SELECT * FROM $tablename where $field = $param");
        }
        catch (Exception $e)
        {
            logModel::debug($e->getMessage()."SELECT * FROM $tablename where $field = $param");
        }  
    }
    /**
     * テーブル定義取得
     */
    public function getTableDefine($tablename)
    {
        try
        {
            $this->_db->setFetchMode(Zend_Db::FETCH_OBJ);
            return $this->_db->fetchAll("SELECT * FROM $tablename");

        }
        catch(Exception $e)
        {
            logModel::debug("getTableDefine is Error");
        }
    }
    /**
     * デストラクタ
     */
    function  __destruct() {
        try
        {        
            $this->_db->closeConnection();
            logModel::debug("db->close処理");
        }
        catch (Exception $e)
        {
            logModel::debug($e->getMessage());
        }
    }
}