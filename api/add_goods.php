<?php

include_once "../base.php";

if(!empty($_FILES['file']['tmp_name'])){
  $data["file"]=$_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'],"./img/".$data["file"]);
}

$data['no']=rand(100000,999999);

foreach($_POST as $key => $value){
  if($key!="file"){
    $data[$key]=$value;
  }
}

save("goods",$data);

to("../admin.php?do=th");

?>