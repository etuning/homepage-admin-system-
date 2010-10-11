<?php
/**
 * Description of ImgUpload
 *
 * @author yukihiro
 */
class File_Upload_Image
{
    function  __construct()
    {}

    static function FileUpload($filepath)
    {
        for($i = 0; $i < count(@$_FILES['uploadfile']['name']);$i++)
        {
            if(strlen($_FILES['uploadfile']['name'][$i]) > 0)//画像ファイルの拡張子を取得判定
            {
                $imgType = $_FILES['uploadfile']['type'][$i];
                $extension = '';
                if($imgType == 'image/gif')
                {
                    $extension = 'gif';
                }
                else if($imgType == 'image/png' || $imgType == 'image/x-png')
                {
                    $extension = 'png';
                }
                else if($imgType == 'image/jpeg' || $imgType == 'image/pjpeg')
                {
                    $extension = 'jpg';
                }
                else if($extension == '')
                {
                    logModel::debug("画像の拡張子が設定されていません");
                }

                $checkImage = @getimagesize($_FILES['uploadfile']['tmp_name'][$i]);
                
                if($checkImage == FALSE)
                {
                    logModel::debug("画像ファイルがアップロードされていません");

                }
                else if($imgType != $checkImage['mime'])
                {
                    logModel::debug("拡張子が異なります");
                }
                else if($_FILES['uploadfile']['size'][$i] > 102400)
                {
                    logModel::debug("ファイルサイズが大きすぎます。100kb以下にして下さい");
                }
                else
                {
                    $moveTo = $filepath . '/upfile_' . time() . $i .'.' . $extension;
                    if(!move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i],$moveTo))
                    {
                        logModel::debug("画像のアップロードに失敗しました");
                    }
                }                
            }
        }
    }
}
