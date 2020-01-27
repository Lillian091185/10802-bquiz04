<?php

$rows=all("admin");

?>
<div class="ct"><button onclick="lof('admin.php?do=add_admin')">新增管理員</button></div>
<table class="all">
  <tr class="tt">
    <td class="ct">帳號</td>
    <td class="ct">密碼</td>
    <td class="ct">管理</td>
  </tr>
<?php
foreach($rows as $r){
?>  
  <tr class="pp">
    <td class="ct"><?=$r["acc"];?></td>
    <td class="ct"><?=str_repeat("*",strlen($r["pw"]));?></td>
    <td class="ct">
    <?php
    if($r['acc']=="admin"){
    ?>
    此帳號為最高權限
    <?php
    }else{
      ?>
      <button onclick="lof('admin.php?do=edit_admin&id=<?=$r['id'];?>')">修改</button>
      <button onclick="del('admin',<?=$r['id'];?>)">刪除</button>

      <?php
    }
    ?>
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
