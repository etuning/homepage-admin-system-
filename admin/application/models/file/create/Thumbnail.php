<?php
/* 
 * ログ出力クラス
 */
require_once dirname(__FILE__).'/../../log/Creater.php';
/**
 * Description of File_Create_Thumbnail
 *
 * @author yukihiro
 */
class File_Create_Thumbnail
{
    function  __construct()
    {}
    static function createThumbnail($fileName,$w,$h)
    {
        /**
         * サムネイル初期設定
         */
        try
        {
            $newW = 80;
            $newH = intval($newW / $w * $h);
            header('Content-Type : image/png');//各拡張子に応じて変更要
            $imgThumb = imagecreate($newW, $newH);
            $image = imagecreatefrompng($fileName);
            logModel::debug("サムネイル初期設定に成功");
        }
        catch(Exception $ex)
        {
            logModel::debug("サムネイル初期設定に失敗：：".$ex->getMessage());
        }
        /**
         * サムネイル出力
         */
        try
        {
            if(imagecopyresampled($imgThumb, $image, 0,0, 0, 0, $newW,$newH, $w, $h))
            {
                imagepng($imgThumb);
            }
            imagedestroy($image);
            imagedestroy($imgThumb);
            logModel::debug("サムネイル出力処理に成功");
        }
        catch(Exception $ex)
        {
            logModel::debug("サムネイル出力処理に失敗：：".$ex->getMessage());
        }        
    }
}
