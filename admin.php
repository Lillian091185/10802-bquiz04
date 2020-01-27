<?php include_once "base.php";

//進行登入合法性的判斷
if(empty($_SESSION["admin"])){
  echo "非法登入，請回首頁";
  exit();
}

//取出登入者的資料
$ad=find("admin",["acc"=>$_SESSION['admin']]);

//將pr欄位的字串還原成陣列
$prs=unserialize($ad['pr']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-3.4.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./icon/0416.jpg">
            </a>
                            <img src="./icon/0417.jpg">
                   </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
        	            	<a href="?do=admin">管理權限設置</a>
            	          <?=(in_array(1,$prs))?"<a href='?do=th'>商品分類與管理</a>":"";?>  	
            	          <?=(in_array(2,$prs))?"<a href='?do=order'>訂單管理</a>":"";?>  	
            	          <?=(in_array(3,$prs))?"<a href='?do=mem'>會員管理</a>":"";?>  	
            	          <?=(in_array(4,$prs))?"<a href='?do=bot'>頁尾版權管理</a>":"";?>  	
            	          <?=(in_array(5,$prs))?"<a href='?do=news'>最新消息管理</a>":"";?>  	
            	        	<a href="?do=logout" style="color:#f00;">登出</a>
                    </div>
                    </div>
        <div id="right">
		<?php
            $do=(!empty($_GET['do']))?$_GET['do']:"admin";
            $path="./admin/" . $do . ".php";
            if(file_exists($path)){
                include $path;
            }else{
                include "./admin/admin.php";
            }
        ?>
        	        </div>
        <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
        <?=find("bottom",1)["bottom"];?>       </div>
    </div>

</body></html>