<?php

//判斷使用者是否登入，如未登入則導引到會員登入頁
if(empty($_SESSION['member'])){
  to("index.php?do=login");
  exit();
}

//判斷網址是否帶有商品資訊，有的話則加入購物車
if(!empty($_GET["id"])){
  $_SESSION['cart'][$_GET['id']]=$_GET["qt"];
}

//判斷購物車是否有內容，並做相應的處理
if(empty($_SESSION['cart'])){
  echo "<h1 class='ct'>購物車中沒有商品</h1>";
}else{
?>
<h2 class="ct"><?=$_SESSION['member'];?>的購物車</h2>
<table class="all">
  <tr class="tt ct">
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
  </tr>
  <?php
foreach($_SESSION['cart'] as $id => $qt){
  $item=find("goods",$id);
?>
  <tr class="pp">
    <td><?=$item['no'];?></td>
    <td><?=$item['name'];?></td>
    <td><?=$qt;?></td>
    <td><?=$item['qt'];?></td>
    <td><?=$item['price'];?></td>
    <td><?=$item['price']*$qt;?></td>
    <td><a href="#" onclick="delCart(<?=$item['id'];?>)"><img src="./icon/0415.jpg" ><a></td>
  </tr>
<?php

}

?>
</table>
<div class="ct">
  <a href="index.php">
    <img src="./icon/0411.jpg" alt="">
  </a>
  <a href="index.php?do=billing">
    <img src="./icon/0412.jpg" alt="">
  </a>
</div>
<?
}
?>

<script>
//建立一個函式用來刪除購物車中的商品
function delCart(id){
  $.post("./api/del_cart.php",{id},function(){

    //使用location.href的方式而不是直接使用location.reload()來跳頁
    //目的是為了清楚網址列上的參數
    location.href="index.php?do=buycart";
  })
}
</script>