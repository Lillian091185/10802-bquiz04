<style>
.all{
  margin:auto;
}
</style>

<?php
$order=find("ord",$_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red"><?=$order["no"];?></span>的詳細資料</h2>
<?php

//依據登入者的帳號來取得會員資料

?>
<table class="all">
  <tr>
    <td class="tt">登入帳號</td>
    <td class="pp"><?=$order['acc'];?></td>
  </tr>
  <tr>
    <td class="tt">姓名</td>
    <td class="pp"><?=$order['name'];?></td>
  </tr>
  <tr>
    <td class="tt">電子信箱</td>
    <td class="pp"><?=$order['email'];?></td>
  </tr>
  <tr>
    <td class="tt">聯絡地址</td>
    <td class="pp"><?=$order['addr'];?></td>
  </tr>
  <tr>
    <td class="tt">聯絡電話</td>
    <td class="pp"><?=$order['tel'];?></td>
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
  //將goods欄位的字串還原成為購物車陣列
  $goods=unserialize($order['goods']);

  //將購物車的內容逐一列出
  foreach($goods as $id => $qt){
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
  }
?>
</table>
<div class="all ct tt">總價:<?=$order['total'];?></div>
<div class="ct">
  <!--建立一個隱藏欄位用來存放總價,方便js取用-->

  <input type="button" value="返回" onclick="lof('admin.php?do=order')">
</div>

