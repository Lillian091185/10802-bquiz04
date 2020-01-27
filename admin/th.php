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
<div class="ct"><button onclick="lof('admin.php?do=add_goods')">新增商品</button></div>
<table class="all">
  <tr class="tt">
    <td class="ct">編號</td>
    <td class="ct">商品名稱</td>
    <td class="ct">庫存量</td>
    <td class="ct">狀態</td>
    <td class="ct">操作</td>
  </tr>
  <?php
    $goods=all("goods");
    foreach($goods as $g){
  ?>
  <tr class="pp">
    <td class="ct"><?=$g['no'];?></td>
    <td><?=$g['name'];?></td>
    <td class="ct"><?=$g['qt'];?></td>
    <!--在這個td標籤中加入id屬性來做為改變內容的依據-->
    <td class="ct" id="sh<?=$g['id'];?>"><?=($g['sh']==1)?"販售中":"已下架";?></td>
    <td class="ct">
      <button onclick="lof('admin.php?do=edit_goods&id=<?=$g['id'];?>')">修改</button>
      <button onclick="del('goods',<?=$g['id'];?>)">刪除</button>
      <button onclick="shGoods(<?=$g['id'];?>,1)">上架</button>
      <button onclick="shGoods(<?=$g['id'];?>,0)">下架</button>

    </td>
  </tr>
  <?php
  }
  ?>
</table>

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

//建立一個用來上下架商品的函式
function shGoods(id,sh){

//根據傳入的商品id及顯示與否的值，通知api去更新資料
$.post("./api/show_goods.php",{id,sh},function(){

  //根據顯示與否來動態更新頁面上的文字內容
  switch(sh){
    case 1:
      $("#sh"+id).html("販售中")
    break;
    case 0:
      $("#sh"+id).html("已下架")
    break;
  }
})
}

function del(table,id){
  $.post("./api/del.php",{table,id},function(){
    location.reload()
  })
}

</script>