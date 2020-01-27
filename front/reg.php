<h1 class="ct">會員註冊</h1>
<table class="all">
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"><button onclick="chkacc()">檢測帳號</button></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input type="text" name="tel" id="tel"></td>
  </tr>
  <tr>
    <td class="tt ct">住址</td>
    <td class="pp"><input type="text" name="addr" id="addr"></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email"></td>
  </tr>
</table>
<div class="ct"><button onclick="reg()">註冊</button><button>重置</button></div>
<script>

//建立一個檢查帳號用的函式
function chkacc(){
  let acc=$("#acc").val()
  $.get("./api/chkacc.php",{acc},function(chk){

    //根據檢查的結果彈出不同的訊息視窗
    if(chk=='1' || acc=="admin"){
      alert("此帳號已被註冊")

    }else{
      alert("此帳號可使用")

    }
  })
}

//建立一個註冊專用的函式
function reg(){

  //取得所有的表單輸入內容
  let name=$("#name").val()
  let acc=$("#acc").val()
  let pw=$("#pw").val()
  let tel=$("#tel").val()
  let addr=$("#addr").val()
  let email=$("#email").val()

//先檢查帳號是否重覆
  $.get("./api/chkacc.php",{acc},function(chk){
    if(chk=='1' || acc=="admin"){
      alert("此帳號已被註冊")

    }else{

      //帳號沒有重覆的話,把表單資料送到後台去做新增的動作
      $.post("./api/reg.php",{name,acc,pw,tel,addr,email},function(res){
        if(res=='1'){

          //註冊完成後將使用者導回登入頁
          location.href="index.php?do=login"
        }
      })

    }
  })
}
</script>