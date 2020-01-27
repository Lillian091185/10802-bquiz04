<h1 class="ct">商品分類</h1>

<form action="./api/add_type.php" class="ct" method="post">
新增大分類
<input type="text" name="text"><input type="submit" value="新增">
</form>
<form action="./api/add_type.php" class="ct" method="post">
新增中分類
<select name="parent">
<?php
$bigs=all("type",["parent"=>0]);
foreach($bigs as $b){
  echo "<option value='".$b['id']."'>".$b['text']."</option>";
}
?>
</select>
<input type="text" name="text"><input type="submit" value="新增">
</form>
<table class="all">
<?php

foreach($bigs as $b){
?>
  <tr class="tt">
    <td><?=$b["text"];?></td>
    <td>
      <button onclick="editType(this,<?=$b['id'];?>)">修改</button>
      <button onclick="del('type',<?=$b['id'];?>)">刪除</button>
    </td>
  </tr>
  <?php
    $subs=all("type",['parent'=>$b['id']]);
    if(!empty($subs)){
      foreach($subs as $s){
    ?>
      <tr class="pp">
        <td><?=$s['text'];?></td>
        <td>
          <button onclick="editType(this,<?=$s['id'];?>)">修改</button>
          <button onclick="del('type',<?=$s['id'];?>)">刪除</button>
        </td>
      </tr>
    <?php
    }
  }
  ?>
<?php
}
?>
</table>
<h1 class="ct">商品管理</h1>

<script>
//建立一個用來編輯分類文字的函式
function editType(dom,id){

  //利用dom來找到上層存放分類名稱的dom並取得文字內容
  let text=$(dom).parent("td").prev().html()

  //利用prompt自帶輸入框的彈出畫面來讓使用者可以修改內容
  let result=prompt("請輸入你要修改的分類名稱",text)

  if(result!==null){

    //將修改後的分類文字內容及id傳至api進行更新，同時利用dom來動態更新畫面上的文字
    $.post("./api/edit_type.php",{id,result},function(){
      $(dom).parent("td").prev().html(result)
    })
  }
}

function del(table,id){
  $.post("./api/del.php",{table,id},function(){
    location.reload()
  })
}

</script>