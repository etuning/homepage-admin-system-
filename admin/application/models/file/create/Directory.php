<?php
/**
 * Description of File_Create_Directory
 *
 * @author yukihiro
 */
class File_Create_Dirctory
{
    /**
     * コンストラクタ
     */
    function  __construct()
    {
        ;
    }
    /**
     *フォルダ名
     * @param <type> $_dirname 
     */
    static function createDirectory($_dirname)
    {        
        if(is_dir($_dirname))
        {
            logModel::debug("$_dirname は既に存在しています");
        }
        else
        {
            if(mkdir($_dirname))
            {
                logModel::debug("$_dirname の作成に成功しました。");
            }
            else
            {
                logModel::debug("$_dirname の作成に失敗しました。");
            }            
        }
    }
}
?>
