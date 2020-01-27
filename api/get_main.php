<?php

include_once "../base.php";
$rows=all("type",["parent"=>0]);
foreach($rows as $r){
  echo "<option value='".$r['id']."'>".$r['text']."</option>";
}

?>