<?php

$good=find("goods",$_GET['id']);


?>
<h1 class="ct"><?=$good['name'];?></h1>
<table class="all">
  <tr>
    <td rowspan="5" class="pp ct" width="60%">
      <a href="index.php?do=detail&id=<?=$g['id'];?>">
       <img src="./img/<?=$good['file'];?>" style="width:90%;height:250px;">
      </a>
    </td>
    <td class="pp">
      分類:<?=find("type",$good['main'])['text'].">".find("type",$good['sub'])['text'];?>
    </td>
  </tr>
  <tr>
    <td class="pp">編號:<?=$good['no'];?></td>
  </tr>
  <tr>
    <td class="pp">
      價錢:<?=$good['price'];?>
    </td>
  </tr>
  <tr>
    <td class="pp">詳細說明:<?=$good['intro'];?></td>
  </tr>
  <tr>
    <td class="pp">庫存量:<?=$good['qt'];?></td>
  </tr>
</table>
<form action="index.php" method="get" class="tt ct">
  購買數量:
  <input type="hidden" name="do" value="buycart"> 
  <input type="hidden" name="id" value="<?=$good['id'];?>"> 
  <input type="number" name="qt" value="1" style="width:40px;">
  <input type="submit" value="" style="background:url('./icon/0402.jpg') no-repeat center;width:57px;height:18px;margin:0;padding:0">
</form>