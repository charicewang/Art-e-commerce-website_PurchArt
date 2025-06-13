<?php


session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
//echo "<h1>你好 ".$user_icon."</h1>";
mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");
//圖片
$result = $link->query("select * from 作品, 圖片 where 作品.作品編號=圖片.作品編號;");

$workid = $_GET['value'];

$i = 0;
while($row=$result->fetch()){
   $j = 0;
   $arr_圖[$i][$j] = $row['作品編號'];
   ++$j;

   $arr_圖[$i][$j] = $row['會員ID'];
   ++$j;

   $arr_圖[$i][$j] = $row['作品名稱'];
   ++$j;

   $arr_圖[$i][$j] = $row['作品說明'];
   ++$j;

   $arr_圖[$i][$j] = $row['創造日期'];
   ++$j;

   $arr_圖[$i][$j] = $row['圖片'];
   ++$j;

   $arr_圖[$i][$j] = $row['tags'];
   
   ++$i;
   $i圖 = $i;
   }
//echo $arr[$i-1][5];

//影片
$result_vedio = $link->query("select * from 作品, 影片 where 作品.作品編號=影片.作品編號;");

$iv = 0;
while($row=$result_vedio->fetch()){
   $j = 0;
   $arr_影[$iv][$j] = $row['作品編號'];
   ++$j;

   $arr_影[$iv][$j] = $row['會員ID'];
   ++$j;

   $arr_影[$iv][$j] = $row['作品名稱'];
   ++$j;

   $arr_影[$iv][$j] = $row['作品說明'];
   ++$j;

   $arr_影[$iv][$j] = $row['創造日期'];
   ++$j;

   $arr_影[$iv][$j] = $row['圖片'];
   ++$j;

   $arr_影[$iv][$j] = $row['tags'];
   
   ++$iv;
   }
//echo $iv;
//echo $arr[$iv-1][5];


//漫畫
$result_漫畫 = $link->query("select * from 作品, 漫畫 where 作品.作品編號=漫畫.作品編號;");

$im = 0;
while($row=$result_漫畫->fetch()){
   $j = 0;
   $arr_漫[$im][$j] = $row['作品編號'];
   ++$j;

   $arr_漫[$im][$j] = $row['會員ID'];
   ++$j;

   $arr_漫[$im][$j] = $row['作品名稱'];
   ++$j;

   $arr_漫[$im][$j] = $row['作品說明'];
   ++$j;

   $arr_漫[$im][$j] = $row['創造日期'];
   ++$j;

   $arr_漫[$im][$j] = $row['圖片'];
   ++$j;

   $arr_漫[$im][$j] = $row['tags'];
   
   ++$im;
   }
//echo $im;
//echo $arr[$im-1][5];

//文章
$result_文章 = $link->query("select * from 作品, 文章 where 作品.作品編號=文章.作品編號;");

$ia = 0;
while($row=$result_文章->fetch()){
   $j = 0;
   $arr_文[$ia][$j] = $row['作品編號'];
   ++$j;

   $arr_文[$ia][$j] = $row['會員ID'];
   ++$j;

   $arr_文[$ia][$j] = $row['作品名稱'];
   ++$j;

   $arr_文[$ia][$j] = $row['作品說明'];
   ++$j;

   $arr_文[$ia][$j] = $row['創造日期'];
   ++$j;

   $arr_文[$ia][$j] = $row['圖片'];
   ++$j;

   $arr_文[$ia][$j] = $row['tags'];
   
   ++$ia;
   }
//echo $ia;
//echo $arr[$ia-1][5];

//$workid = 

$sql = "INSERT INTO  購物車(會員ID,產生時間,商品編號) VALUES ('$user_id','" . date("Y/m/d/G/i") . "','$workid')";
$link->query($sql);

//echo "商品已放入購物車";
//重定向瀏覽器
header("Location:buy.php");
//確保重定向後，後續程式碼不會被執行
exit;

?>