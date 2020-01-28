<?php
include_once "../base.php";

//建立一個符合要求的訂單編碼，訂購年月日＋流水號或自訂編號
$data["no"]=date("Ymd").rand(100000,999999);

//存入登入者的會員帳號
$data["acc"]=$_SESSION['member'];

//將ajax傳遞過來的幾個內容存入陣列
$data["name"]=$_POST['name'];
$data["addr"]=$_POST['addr'];
$data["email"]=$_POST['email'];
$data["tel"]=$_POST['tel'];
$data["total"]=$_POST['total'];

//將購物車的內容序列化成字串
$data["goods"]=serialize($_SESSION['cart']);

//將資料存入資料表
save("ord",$data);

//清空購物車
unset($_SESSION['cart']);


?>