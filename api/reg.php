<?php

include_once "../base.php";

//直接將整個POST過來的資料存入資料表
save("member",$_POST);
echo 1;
?>