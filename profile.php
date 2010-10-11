<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel ="stylesheet" href ="css/common.css" type="text/css" />
<title>山野智子 フルート</title>
</head>
<body id="tomoko-wpj">
<div id="wrapper">
	<div id="contents">
        <?php include 'element/common/header.php';?>
		<div id="main-feature">
        <?php include 'element/common/contents_menu.php';?>
		<?php
            $no = $_REQUEST["no"];
            include "element/profile/menu.php";
            include "element/profile/contents.php";
		?>
		</div>
		<div id="side-menu">
        <a href="admin/index.php">管理者</a>
		</div>
		<div id="recent-news">
		</div>
	</div>
</div>
<?php include 'element/common/footer.php';?>
</body>
</html>