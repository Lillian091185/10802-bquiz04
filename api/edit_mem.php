<?php
include_once "../base.php";
$id=$_POST['id'];
$data=find("member",$id);
$data["name"]=$_POST["name"];
$data["addr"]=$_POST["addr"];
$data["tel"]=$_POST["tel"];
$data["email"]=$_POST["email"];

save("member",$data);

to("../admin.php?do=mem");

?>