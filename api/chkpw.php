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

  //利用table來判斷登入的使用者是一般會員還是管理者，並給予不同的session變數
  switch($table){
    case "admin":
      $_SESSION["admin"]=$acc;
    break;
    case "member":
      $_SESSION["member"]=$acc;
    break;
  }  

}else{
  echo 0;
}
?>