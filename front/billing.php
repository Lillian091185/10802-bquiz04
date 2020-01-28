<style>
.all{
  margin:auto;
}
</style>
<h1 class="ct">填寫資料</h1>
<?php

//依據登入者的帳號來取得會員資料
$mem=find("member",["acc"=>$_SESSION['member']]);
?>
<table class="all">
  <tr>
    <td class="tt">登入帳號</td>
    <td class="pp"><?=$_SESSION['member'];?></td>
  </tr>
  <tr>
    <td class="tt">姓名</td>
    <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name'];?>"></td>
  </tr>
  <tr>
    <td class="tt">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email'];?>"></td>
  </tr>
  <tr>
    <td class="tt">聯絡地址</td>
    <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr'];?>"></td>
  </tr>
  <tr>
    <td class="tt">聯絡電話</td>
    <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel'];?>"></td>
  </tr>
</table>
<table class="all">
  <tr class="tt ct">
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>

  </tr>
  <?php
  //建立一個計算總價變數
  $total=0;

  //將購物車的內容逐一列出
foreach($_SESSION['cart'] as $id => $qt){
  $item=find("goods",$id);
?>
  <tr class="pp">
    <td><?=$item['name'];?></td>
    <td><?=$item['no'];?></td>
    <td><?=$qt;?></td>
    <td><?=$item['price'];?></td>
    <td><?=$item['price']*$qt;?></td>
  </tr>
<?php
$total=$total+($item['price']*$qt);
}

?>
</table>
<div class="all ct tt">總價:<?=$total;?></div>
<div class="ct">
  <!--建立一個隱藏欄位用來存放總價,方便js取用-->
  <input type="hidden" name="total" id="total" value="<?=$total;?>">
  <input type="button" value="確定送出" onclick="billing()">
  <input type="button" value="返回修改訂單" onclick="lof('index.php?do=buycart')">
</div>

<script>

//建立一個函式來取得表單內容，取代form
function billing(){
  let name=$("#name").val()
  let addr=$("#addr").val()
  let email=$("#email").val()
  let tel=$("#tel").val()
  let total=$("#total").val()

  //使用ajax的方式來傳送表單內容
  $.post("./api/billing.php",{name,addr,email,tel,total},function(){
    
    //彈出提示訊息
    alert("訂購成功\n感謝您的選購")
    
    //將使用者導回首頁
    location.href="index.php"
  })
}

</script>