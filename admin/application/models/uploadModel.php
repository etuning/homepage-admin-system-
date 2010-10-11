<?php
/**
 * Description of updateModel
 * @author yukihiro
 */
class uploadModel
{
    function  __construct()
    {}
    public function uploadFile()
    {
        if(is_uploaded_file($_FILES["upfile"]["tmp_name"]))
        {
            if(move_uploaded_file($_FILES["upfile"]["tmp_name"], $_dirpath.$_FILES["upfile"]["tmp_name"]))
            {
                chmod($_dirpath.$_FILES["upfile"]["tmp_name"], 0644);
                logModel::debug($_dirpath.$_FILES["upfile"]["tmp_name"]."をアップロードしました");
            }
            else
            {
                logModel::debug("ファイルをアップロード出来ませんでした。");
            }
        }
        else
        {
            logModel::debug("ファイルが選択されていない可能性があります。");
        }
    }
    public function createDir($_dirname)
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
    public function setDirPath()
    {
        return "../images/$categoryId/$pageId/$page_title"."_".$n."png";
    }
}
