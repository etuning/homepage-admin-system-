<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Writer
 *
 * @author yukihiro
 */
class logModel
{
    private static function writer()
    {
        $stream = @fopen('log/logger.txt','a',false);
        if(!$stream){
            throw new Exception('Streamのオープンに失敗しました。');
        }

        $logger = new Zend_Log();
        $writer = new Zend_Log_Writer_Stream($stream);
        $filter = new Zend_Log_Filter_Priority(Zend_Log::DEBUG);
        $writer ->addFilter($filter);
        $logger = new Zend_Log($writer);
        return $logger;
    }
    public static function debug($msg)
    {
        $logger = logModel::writer();
        $backtrace = debug_backtrace();
        $logger->debug(' class = '.$backtrace[1]['class']
                            .' : function = '.$backtrace[1]['function']
                            .' : line = '.$backtrace[1]['line']
                            .' : file = '.$backtrace[1]['file']
                            ."\n : ".$msg);
    }
}
