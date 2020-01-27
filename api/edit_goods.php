<?php

include_once "../base.php";

$data=find("goods",$_POST['id']);

if(!empty($_FILES['file']['tmp_name'])){
  $data["file"]=$_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$data["file"]);
}

foreach($_POST as $key => $value){
  if($key!="file"){
    $data[$key]=$value;
  }
}

save("goods",$data);

to("../admin.php?do=th");

?>