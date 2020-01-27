<?php

//根據GET值來取得該筆商品的資料
$row=find("goods",$_GET['id']);

?>
<h1 class="ct">修改商品</h1>
<form action="./api/edit_goods.php" method="post" enctype="multipart/form-data">
  <table class="all">
    <tr>
      <td class="tt">所屬大分類</td>
      <td class="pp">
      <select name="main" id="mains">
        <?php
        //直接以php的方式來取出選項內容並根據商品的大分類來選定大分類項目
          $main=all("type",["parent"=>0]);
          foreach($main as $m){
            $selected=($m['id']==$row['main'])?"selected":"";
            echo "<option value='".$m['id']."' $selected>".$m['text']."</option>";
          }
        ?>
      </select>
      </td>
    </tr>
    <tr>
      <td class="tt">所屬中分類</td>
      <td class="pp">
        <select name="sub" id="subs">
        <?php
        //直接以php的方式來取出選項內容並根據商品的中分類來選定中分類項目
          $sub=all("type",["parent"=>$row['main']]);
          foreach($sub as $s){
            $selected=($s['id']==$row['sub'])?"selected":"";
            echo "<option value='".$s['id']."' $selected>".$s['text']."</option>";
          }
        ?>
        </select>
      </td>
    </tr>
    <tr>
      <td class="tt">商品編號</td>
      <td class="pp"><?=$row['no'];?></td>
    </tr>
    <tr>
      <td class="tt">商品名稱</td>
      <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
    </tr>
    <tr>
      <td class="tt">商品價格</td>
      <td class="pp"><input type="number" name="price" value="<?=$row['price'];?>"></td>
    </tr>
    <tr>
      <td class="tt">規格</td>
      <td class="pp"><input type="text" name="spec" value="<?=$row['spec'];?>"></td>
    </tr>
    <tr>
      <td class="tt">庫存量</td>
      <td class="pp"><input type="number" name="qt" value="<?=$row['qt'];?>"></td>
    </tr>
    <tr>
      <td class="tt">商品圖片</td>
      <td class="pp"><input type="file" name="file" id="file"></td>
    </tr>
    <tr>
      <td class="tt">商品介紹</td>
      <td class="pp"><textarea name="intro" id="intro" style="width:80%;height:100px"><?=$row['intro'];?></textarea></td>
    </tr>
  </table>
  <div class="ct">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="lof('admin.php?do=th')">
  </div>
</form>

<script>

//註冊大分類選單的onchange事件，同時觸發中分類選單的連動更新
$("#mains").on("change",function(){
  let main=$(this).val()
  sub(main)
})

//建立一個函式用來取得大分類的選項內容
function main(){
  $.get("./api/get_main.php",function(res){
    $("#mains").html(res)

    //在建立完大分類後，取得目前大分類的第一個項目值，然後呼叫中分類的函式
    let main=$("#mains").val()
    sub(main)
  })
}

//建立一個中分的函式，根據傳入的大分類id值來取得對應的中分類選項內容
function sub(main){
  $.get("./api/get_sub.php",{main},function(res){
    $("#subs").html(res)
  })
}


</script>