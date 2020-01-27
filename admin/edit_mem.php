<h1 class="ct">編輯會員資料</h1>
<form action="./api/edit_mem.php" method="post">
<?php
$id=$_GET["id"];
$mem=find("member",$id);
?>

<table class="all">
  <tr>
    <td class="ct tt">帳號</td>
    <td class="pp"><?=$mem["acc"];?></td>
  </tr>
  <tr>
    <td class="ct tt">密碼</td>
    <td class="pp"><?=str_repeat("*",strlen($mem["pw"]));?></td>
  </tr>
  <tr>
    <td class="ct tt">累積交易額</td><td class="pp"><?=$mem["total"];?></td>
  </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" value="<?=$mem["name"];?>"></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="email" value="<?=$mem["email"];?>"></td>
  </tr>
  <tr>
    <td class="tt ct">地址</td>
    <td class="pp"><input type="text" name="addr" value="<?=$mem["addr"];?>"></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input type="text" name="tel" value="<?=$mem["tel"];?>"></td>
  </tr>
</table>
<input type="hidden" name="id" value="<?=$id;?>">
<div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>