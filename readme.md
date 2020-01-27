# 題組四解題步驟

## 步驟一：將素材目錄複製到崗位目錄下，確認素材內容與抽題題號一致
監評長按下倒數計時後，可以先把桌面上素材目錄中的題目素材複製一份到自己的工作目錄下，這時要確認自己複製的題目和抽到的題目是一致的，之後都在工作目錄下來取用相關的素材，這樣比較不容易出錯；在安裝軟體的準備時間裏，也要確認一下電腦桌面中是否有包含了素材這個目錄，並且四個題組的素材都在其中。

---

## 步驟二：將版型檔案及相關素材複製到網站根目錄下，並進行相應的更名及整理
  1. 開立./css, ./js, ./api, ./icon, ./img等常用目錄以利檔案分類及管理
  2. 將素材檔中的.css, .js, 及icon圖檔複製到相應的目錄下
  3. 此題組版型中沒有包含jQuery，請至函式庫目錄下複製jQuery檔案至 ./js目錄下
  4. 將素材目錄下的icon圖檔複製到 `./icon` 目錄下
  5. 將素材目錄下的八件商品圖檔先複製到 `./img` 目錄下
  6. 更改版型素材的相關檔名，以符合解題的需要：
      * 04P01.htm => index.php
      * 04P02.htm => admin.php
  7. 更改版型素材的相關連結及匯入檔內容
      * 修改 `index.php` 及 `admin.php` 中 `<link>` 及 `<script>` 中的連結路徑，指向正確的位置
      * 記得加入jQuery的路徑
      * 修改 `index.php` & `admin.php` 中的圖片連結 ，指向根目錄下的 `./icon` 
  8. 開啟 `xampp` 及 `apache` 伺服器，使用 `localhost` 或 `127.0.0.1` 檢視網頁是否正確顯示，css 的載入是否正確

---

## 步驟三：進行前後台的檔案整理及切版，分離出共用的區塊或功能
  1. 建立 `front`及 `admin` 兩個目錄，一個代表前台的相關檔案，一個代表後台的相關檔案，前後台共用的元件則先放在根目錄下，或另開一個 `comm` 目錄用來存放共用的元件。
  2. 在 `index.php` 中找到中間主要內容區的 `right` 區塊，我們會在這裹建立include的語法，用來載入各個功能的內容。
  3. 在 `admin.php` 中找到中間主要內容區的 `right` 區塊，我們會在這裹建立include的語法，用來載入各個功能的內容。
  4. 使用 `include` 指令來重新組合 `index.php` 及 `admin.php` 頁面，並加上判斷式來確保要組合的檔案是存在的。
  5. 以 `get` 的方式來傳遞各頁面要組合的元件內容，比如 `do=login` 表示要看到的是登入頁面，因此在前台的 `include` 中可以併入 `login.php` 來呈現。
  6. 修改 `index.php` 及 `admin.php` 中的連結內容及寫法，確保可以正確的連結到相應的頁面。
  7. 可以依照選單的連結預先在 `./front/` 及 `./admin/` 目錄中建立所需的連結頁面，可以節省後續製作的檔案操作時間。

---

## 步驟四：建立資料庫連線檔及常用函式。
  1. 建立 `base.php` 檔，用來放共用的設定及函式。
  2. 設定好PDO的連線參數 `$pdo=new PDO()`
  3. 啟用session `session_start()`
  4. 建立全域變數或是共用函式
      * find(\$table,...\$arg) - 尋找特定條件的單筆資料或第一筆資料
      * all(\$table,...\$arg) - 取得資料表的全部資料或是特定條件的全部資料
      * nums(\$table,...\$arg) - 計算符合條件的資料筆數
      * save(\$talbe,\$data) - 新增或更新單筆資料
      * del(\$table,...\$arg) - 刪除特定條件的全部資料
      * q(\$sql) - 簡化 \$pdo->query(\$sql)->fetchAll() 的使用;
      * to(\$path) - 簡化 header("location:xxxxxx") 的使用;
  5. 做好以上工作後，可以先建一張簡單的資料表，把資料庫連線及所有自訂函式功能先測試一次，以確保後續使用不會有問題。

---

## 步驟五：建立資料表及預設資料。
每個題組依狀況不同，在這一步有不同的做法，視自己對題目的熟悉程度來做應變，可以一次把全部資料表建完，也可以視解題的進度來逐步建立或修改資料表。
根據題意，題組四會需要用到以下的資料表：
* admin - 管理員資料表
* bottom - 頁尾版權資料表
* goods - 商品資料表
* member - 會員資料表
* ord - 訂單資料表
* type - 分類資料表

1. 依序建立功能需要的六張資料表:
  * admin

    | name  |  type   |  pk   | default |  A_I  |  note  |
    | :---: | :-----: | :---: | :-----: | :---: | :----: |
    |  id   | int(10) |  yes  |         |  yes  | 流水號 |
    |  acc  |  text   |       |         |       |  帳號  |
    |  pw   |  text   |       |         |       |  密碼  |
    |  pr   |  text   |       |         |       |  權限  |
    
  * bottom

    |  name  |  type   |  pk   | default |  A_I  |   note   |
    | :----: | :-----: | :---: | :-----: | :---: | :------: |
    |   id   | int(10) |  yes  |         |  yes  |  流水號  |
    | bottom |  text   |       |         |       | 頁尾版權 |

  * goods
  
    | name  |  type   |  pk   | default |  A_I  |   note   |
    | :---: | :-----: | :---: | :-----: | :---: | :------: |
    |  id   | int(10) |  yes  |         |  yes  |  流水號  |
    |  no   |  text   |       |         |       | 商品編號 |
    | name  |  text   |       |         |       | 商品名稱 |
    | price | int(5)  |       |         |       | 商品單價 |
    |  qt   | int(5)  |       |         |       |  庫存量  |
    | spec  |  text   |       |         |       |   規格   |
    | intro |  text   |       |         |       | 商品簡介 |
    | file  |  text   |       |         |       | 商品圖片 |
    | main  | int(5)  |       |         |       |  大分類  |
    |  sub  | int(5)  |       |         |       |  次分類  |
    |  sh   | int(2)  |       |    1    |       | 是否上架 |

  * member
  
    |  name   |  type   |  pk   |       default       |  A_I  |   note   |
    | :-----: | :-----: | :---: | :-----------------: | :---: | :------: |
    |   id    | int(10) |  yes  |                     |  yes  |  流水號  |
    |   acc   |  text   |       |                     |       |   帳號   |
    |   pw    |  text   |       |                     |       |   密碼   |
    |  name   |  text   |       |                     |       |   姓名   |
    |   tel   |  text   |       |                     |       |   電話   |
    |  addr   |  text   |       |                     |       |   地址   |
    |  email  |  text   |       |                     |       | 電子郵件 |
    | regdate |  date   |       | current_timestamp() |       | 註冊日期 |
    |  total  | int(10) |       |          0          |       |   總價   |

  * ord
  
    |  name   |  type   |  pk   |       default       |  A_I  |   note   |
    | :-----: | :-----: | :---: | :-----------------: | :---: | :------: |
    |   id    | int(10) |  yes  |                     |  yes  |  流水號  |
    |   no    |  text   |       |                     |       |   編號   |
    |   acc   |  text   |       |                     |       |   帳號   |
    |  name   |  text   |       |                     |       |   姓名   |
    |  email  |  text   |       |                     |       |   姓名   |
    |  addr   |  text   |       |                     |       |   姓名   |
    |   tel   |  text   |       |                     |       |   姓名   |
    |  total  | int(10) |       |                     |       |   總價   |
    |  goods  |  text   |       |                     |       | 商品內容 |
    | orddate |  text   |       | current_timestamp() |       | 訂購日期 |

  * type
  
    |  name  |  type   |  pk   | default |  A_I  |   note   |
    | :----: | :-----: | :---: | :-----: | :---: | :------: |
    |   id   | int(10) |  yes  |         |  yes  |  流水號  |
    |  text  |  text   |       |         |       | 選單名稱 |
    | parent | int(2)  |       |    0    |       |  大分類  |

2. 為了解題順利，可以把資料表中的一些欄位設為可接受空值的狀況，這樣即使未設定內容，也能正常新增或更改資料，不過這個做法只是為了先求解題完成而做的取巧，實務上應該根據需求及功能來決定欄位是否可以接受空值，並在程式端檢查來源資料是否為空值

---

## 步驟六：建置首頁標題區及相關頁面內容-最新消息及購物流程。
項目三提到的內容大多都是後面的功能有做完就會有的，但反過來說，如果後面的相關功能沒完成的話，這邊會再多扣五分，而題組四中有些功能是和資料庫無關的，因此我們會先在這步驟把這些相較之下可以快速完成的功能先做完。

1. 在 `./front/` 中的 `news.php` 中建置最新消息內容，參考項目(六)
2. 在 index.php  中加入最新消息的兩則跑馬燈消息

```html
<marquee>
    情人節特惠活動 &nbsp; 年終特賣會開跑了  
</marquee>
```

3. 最新消息的描述中，並沒有提到點擊標題後顯示詳細內容，再加上後台也沒有最新消息管理的功能，因此這邊我們只先做到顯示兩則消息的標題即可，後續功能做完再回頭來補，而詳細內容的功能，我建議是使用jQuery的hide()和show()來做切換顯示即可，參考以下寫法：

```html

<table class="all" id="n0">
    <tr class="tt">
        <td>標題</td>
    </tr>
    <tr class="pp">
        <td onclick="javascript:$('.all').hide();$('#n1').show()">
            年終特賣會開跑了
        </td>
    </tr>
    <tr class="pp">
        <td onclick="javascript:$('.all').hide();$('#n2').show()">
            情人節特惠活動
        </td>
    </tr>
</table>

<table class="all" id="n1" style="display:none">
    <tr>
        <td class="tt">標題</td>
        <td class="pp">
            年終特賣會開跑了
        </td>
    </tr>
    <tr>
        <td class="tt">內容</td>
        <td class="pp">
            即日期至年底，凡會員購物滿仟送佰，買越多送越多~
        </td>
    </tr>
    <tr class="ct">
        <td colspan="2">
            <button onclick="javascript:location.href='index.php?do=news'">
                返回
            </button>
        </td>
    </tr>
</table>
<table class="all" id="n2" style="display:none">
    <tr>
        <td class="tt">標題</td>
        <td class="pp">
            情人節特惠活動
        </td>
    </tr>
    <tr>
        <td class="tt">內容</td>
        <td class="pp">
            為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~
        </td>
    </tr>
    <tr class="ct">
        <td colspan="2">
            <button onclick="javascript:location.href='index.php?do=news'">
                返回
            </button>
        </td>
    </tr>
</table>

```
4. 在 `./front/` 中的 `look.php` 中加入購物流程圖片

---

## 步驟七：製作後台頁尾版權區
本題組有些項目的配分明顯的CP值不同，比如頁尾版權區合計有四項描述共二十分，但實際完成這個功能的前後台，可能不用到五分鐘，所以我們會優先把這些項目做完，爭取時間來處理其它的項目

1. 分別先在 `index.php` 及 `admin.php` 的最前頭加上 `<?php include_once "base.php";?>` 這樣可以方便之後的引入檔來使用
2. 先在 `index.php` 及 `admin.php` 的最後頁尾版權區加上取出版權文字的語法 `<?=find("bottom",1)["bottom"];?>`
3. 接著在 `./admmin/` 目錄中的bot.php檔，建置後台需要的表單及功能
4. 我們在表單中放入一個隱藏欄位id，值是寫死的1，因為我們的頁尾版權只會使用到一筆資料
5. 這邊我們不另外寫一個API檔來處理更新資料，而是在form表單的action中指定傳送表單到 `bot.php`，這樣會比較省時間
6. 我們直接在 `bot.php` 中判斷是否有表單送出的動作，同時更新頁尾版權的內容
