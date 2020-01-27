<?php
if(!empty($_POST['bottom'])){
  save("bottom",$_POST);
}
?>

<h1 class="ct">編輯頁尾版權區</h1>
<form action="admin.php?do=bot" method="post">
  <table class="all">
    <tr>
      <td class="tt">頁尾宣告內容</td>
      <input type="hidden" name="id" value="1">
      <td class="pp"><input type="text" name="bottom"  value="<?=find("bottom",1)["bottom"];?>"></td>
    </tr>
  </table>
  <div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>