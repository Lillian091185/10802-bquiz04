<?php
include_once "../base.php";
$id=$_POST['id'];
$data=find("admin",$id);
$data["acc"]=$_POST["acc"];
$data["pw"]=$_POST["pw"];
$data["pr"]=serialize($_POST["pr"]);

save("admin",$data);

to("../admin.php");

?>