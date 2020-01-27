<?php

include_once "../base.php";

//取得要檢查的資料表及帳號資料
$table=$_GET["table"];
$acc=$_GET['acc'];
$pw=$_GET['pw'];

//檢查帳密是否相符並回傳結果
$chk=nums($table,["acc"=>$acc,"pw"=>$pw]);
if($chk>=1){
  echo 1;
}else{
  echo 0;
}
?>