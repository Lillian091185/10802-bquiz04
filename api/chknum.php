<?php

//這邊不需要引入base.php也可以，但是需要session_start()才能讀取session的內容
session_start();
$num=$_GET["num"];
if($num==$_SESSION["num"]){
  echo 1;
}else{
  echo 0;
}

?>