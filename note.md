**第四題**
***
##事前準備
- 要用到jQuery但素材包沒有附->去函式庫抓
- 改圖片路徑，放到個別資料夾etc
- 快的先做 (區塊評分)
- 題目沒有要求做進佔總人數，所以可以放著
***
##切版
- under the div #right
- make the `front` and `back` folders
- copy the code snippet and paste it in the #right div of `backend.php`

```php
<?php
$do=$_GET['do']??'main';
$file="front/".$do.".php";
 if(file_exists($file)){
                include $file;
        }else{
                echo "檔案不存在";
        }
?>
```
***
##第一步
- 做連結對應front檔案
- 做back的檔案們
***
##front/look.php

```php
<div class="ct">
<img src="img/0401.jpg">
</div>
```
這樣就結束ㄌ
***
##front/news.php
- 開0402.txt改編碼(到big5)
- 複製到news.php
 `<marquee behavior="" direction="">年終特賣會開跑了&nbsp;&nbsp;&nbsp;&nbsp;情人節特惠活動</marquee>`
- 把一些字丟到index做marquee
- 
```css
.all td
{
	min-width:50px; //改這邊
	padding:10px;
}
```





