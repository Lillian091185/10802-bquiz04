<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
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
                        <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                //依據登入狀況來判斷要顯示的連結內容
                if(!empty($_SESSION['member'])){
                  echo "<a href='./api/logout.php?logout=member'>登出</a>";
                }else{
                  echo "<a href='?do=login'>會員登入</a>";
                }
                ?> |
                <a href="?do=admin">管理登入</a>
           </div>
           <marquee>
                    情人節特惠活動 &nbsp; 年終特賣會開跑了  
                </marquee></div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
                      <!--選單-->
                      <div class="ww">
              <!--第一個全部商品的連結只要加上全部可顯示的商品數量即可-->
              <a href="index.php">全部商品(<?=nums("goods",["sh"=>1]);?>)</a>
            </div>
            <?php
              //取出全部的大分類資料並印出需要的內容
              $ma=all("type",["parent"=>0]);
              foreach($ma as $m){
            ?>
              <div class="ww">
                <!--在計算數量時，要小心條件的設定除了大分類的id 還要加上是否上架的設定-->
                <a href="index.php?m=<?=$m['id'];?>"><?=$m['text'];?>(<?=nums("goods",["main"=>$m['id'],"sh"=>1]);?>)</a>
                <?php
                  //判斷是否有中分類，有的話才顯示中分類，否則不顯示
                  $chk=nums("type",['parent'=>$m['id']]);
                  if($chk>=1){
                    echo "<div class='s'>";
                    $sub=all("type",['parent'=>$m['id']]);
                    foreach($sub as $s){
                      echo "<a href='index.php?m=".$m['id']."&s=".$s['id']."'>".$s['text']."</a>";
                    }
                    echo "</div>";
                  }
                ?>
              </div>
            <?php
              }

            ?>
        	            </div>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right">
        <?php
            $do=(!empty($_GET['do']))?$_GET['do']:"home";
            $path="./front/" . $do . ".php";
            if(file_exists($path)){
                include $path;
            }else{
                include "./front/home.php";
            }
        ?>
        	        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        <?=find("bottom",1)["bottom"];?>       </div>
    </div>

</body></html>