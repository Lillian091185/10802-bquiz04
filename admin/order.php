<?php

$rows=all("ord");

?>
<h1 class="ct">訂單管理</h1>
<table class="all ct">
  <tr class="tt">
    <td>訂單編號</td>
    <td>金額</td>
    <td>會員帳號</td>
    <td>姓名</td>
    <td>下單時間</td>
    <td>操作</td>
  </tr>
<?php
foreach($rows as $r){
?>  
  <tr class="pp">
    <td><a href='#' onclick="lof('admin.php?do=order_detail&id=<?=$r['id'];?>')"><?=$r["no"];?></a></td>
    <td><?=$r["total"];?></td>
    <td><?=$r["acc"];?></td>
    <td><?=$r["name"];?></td>
    <td><?=$r["orddate"];?></td>
    <td>
      <button onclick="del('ord',<?=$r['id'];?>)">刪除</button>
    </td>
  </tr>
  <?php
  }
?>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>
<script>

function del(table,id){
  $.post("./api/del.php",{table,id},function(){
    location.reload()
  })
}

</script>
