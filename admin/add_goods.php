<h1 class="ct">新增商品</h1>
<form action="./api/add_goods.php" method="post"  enctype="multipart/form-data">
  <table class="all">
    <tr>
      <td class="tt">所屬大分類</td>
      <td class="pp">
      <!--由於原本的版型中己經使用了一個id屬性main,因此這裏我們改用mains-->
      <select name="main" id="mains"></select>
      </td>
    </tr>
    <tr>
      <td class="tt">所屬中分類</td>
      <td class="pp">
        <select name="sub" id="subs"></select>
      </td>
    </tr>
    <tr>
      <td class="tt">商品編號</td>
      <td class="pp">完成分類後自動分配</td>
    </tr>
    <tr>
      <td class="tt">商品名稱</td>
      <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td class="tt">商品價格</td>
      <td class="pp"><input type="number" name="price" id="price"></td>
    </tr>
    <tr>
      <td class="tt">規格</td>
      <td class="pp"><input type="text" name="spec" id="spec"></td>
    </tr>
    <tr>
      <td class="tt">庫存量</td>
      <td class="pp"><input type="number" name="qt" id="qt"></td>
    </tr>
    <tr>
      <td class="tt">商品圖片</td>
      <td class="pp"><input type="file" name="file" id="file"></td>
    </tr>
    <tr>
      <td class="tt">商品介紹</td>
      <td class="pp"><textarea name="intro" id="intro" style="width:80%;height:100px"></textarea></td>
    </tr>
  </table>
  <div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="lof('admin.php?do=th')">
  </div>
</form>

<script>
//在頁面載入完成後先執行一次main()函式來取得所有的大分類選項
main();

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