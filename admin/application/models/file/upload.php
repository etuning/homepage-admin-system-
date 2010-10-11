<?php
if (is_uploaded_file($_FILES["upfile"]["tmp_name"]))
{
    ///フォルダ名も実在するフォルダ名を調べた後、+aで作成する形が良い
    $dirname = "test3";
    ///パスを動的にビルドするクラスがいるかも。
    $dir_path = dirname(__FILE__)."/../img/".$dirname."/";
    /// ../img/$dirname.$_FILES["upfile"]["name"] をdbに登録したい。
    File_Create_Dirctory::createDirectory($dir_path);

    
    if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $dir_path . $_FILES["upfile"]["name"]))
    {
        chmod($dir_path . $_FILES["upfile"]["name"], 0644);
        echo $dir_path.$_FILES["upfile"]["name"] . "をアップロードしました。";
    }
    else
    {
        echo "ファイルをアップロードできません。";
    }
}
else
{
    echo "ファイルが選択されていません。";
}