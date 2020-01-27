<?php

include_once "../base.php";
$main=$_GET["main"];
$rows=all("type",["parent"=>$main]);
foreach($rows as $r){
  echo "<option value='".$r['id']."'>".$r['text']."</option>";
}

?>