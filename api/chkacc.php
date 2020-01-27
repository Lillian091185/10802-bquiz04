<?php
include_once "../base.php";

//檢查帳號是否已存在
$acc=$_GET['acc'];
$chk=nums("member",["acc"=>$acc]);
if($chk>=1){
  echo 1;
}else{
  echo 0;
}

?>