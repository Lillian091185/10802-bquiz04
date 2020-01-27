
<h1 class="ct">管理登入</h1>
<table class="all">
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="tt ct">驗證碼</td>
    <td class="pp">
      <?php
        //產生兩個兩位數的數字
        $a=rand(10,99);
        $b=rand(10,99);

        //將數字相加的結果存到seession中
        $_SESSION['num']=$a+$b;

        //在頁面上印出數字內容及公式
        echo $a . " + " . $b ." = ";
      ?>  
    <input type="text" name="num" id="num"></td>
  </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>

<script>

//建立登入用的js函式
function login(){

  //取得表單的所有輸入內容
  let acc=$("#acc").val()
  let pw=$("#pw").val()
  let num=$("#num").val()

  //先檢查驗證碼的內容是否正確(使用get或post都可以)
  $.get("./api/chknum.php",{num},function(chk){
    if(chk=='1'){

      //如果驗證碼正確則接著進行帳號密碼的確認，記得資料表為管理者資料表
      $.get("./api/chkpw.php",{"table":"admin",acc,pw},function(res){

        //如果帳號和密碼都正確,則將頁面導向後台管理,否則出現錯誤訊並重整頁面
        if(res=='1'){
          location.href="admin.php";
        }else{
          alert("帳號或密碼錯誤");
          location.reload();
        }
      })
    }else{
      //如果驗證碼錯誤則跳出提示訊息
      alert("對不起，您輸入的驗證碼有誤請您重新登入")
    }
  })
}

</script>