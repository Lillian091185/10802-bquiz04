<?php

//根據url的參數，來決定導航內容文字
if(!empty($_GET['s'])){
  $m=$_GET['m'];
  $s=$_GET['s'];
  $mstr=find("type",$m)['text'];
  $sstr=find("type",$s)['text'];
  $nav=$mstr . " > " . $sstr;

  //依據url的參數，來決定要撈出的商品內容
  $goods=all("goods",["sh"=>1,"main"=>$m,"sub"=>$s]);

}else if(!empty($_GET['m'])){
  $m=$_GET['m'];
  $mstr=find("type",$m)['text'];
  $nav=$mstr;
  $goods=all("goods",["sh"=>1,"main"=>$m]);
}else{
  $nav="全部商品";
  $goods=all("goods",["sh"=>1]);
}

//印出導航文字
echo "<h1>$nav</h1>";


foreach($goods as $g){
?>
<table class="all">
  <tr>
    <td rowspan="4" class="pp ct" width="40%">
      <a href="index.php?do=detail&id=<?=$g['id'];?>">
       <img src="./img/<?=$g['file'];?>" style="width:150px;height:100px">
      </a>
    </td>
    <td class="tt ct">
      <?=$g['name'];?>
    </td>
  </tr>
  <tr>
    <td class="pp">
      價錢:<?=$g['price'];?>
      <a href="index.php?do=buycart&id=<?=$g['id'];?>&qt=1">
        <img src="./icon/0402.jpg" style="float:right">
      </a>
    </td>
  </tr>
  <tr>
    <td class="pp">規格:<?=$g['spec'];?></td>
  </tr>
  <tr>
    <td class="pp">簡介:<?=mb_substr($g['intro'],0,25,"utf8");?>...</td>
  </tr>
</table>

<?php
}