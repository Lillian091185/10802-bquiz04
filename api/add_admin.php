<?php
include_once "../base.php";

$data["acc"]=$_POST["acc"];
$data["pw"]=$_POST["pw"];
$data["pr"]=serialize($_POST["pr"]);

save("admin",$data);

to("../admin.php");

?>