<?php
session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
$user_intro = $_SESSION["intro"];
$user_occu = $_SESSION["occu"];
$temp1 = $_SESSION['temp1'];

mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");

$result作者 = $link->query("select * from 作品, 會員資料 where 作品.會員ID=會員資料.會員ID AND 作品.作品編號 = $temp1;");

$i作者 = 0;
while($row=$result作者->fetch()){
   $j = 0;
   $arr_作者[$i作者][$j] = $row['作品編號'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['會員ID'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['作品名稱'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['作品說明'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['創造日期'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['圖片'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['tags'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['姓名'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['頭像圖片'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['說明'];
   ++$j;

   $arr_作者[$i作者][$j] = $row['職業'];
   
   
   
   ++$i作者;
   $i我是作者 = $i作者;
   }
//$row=mysqli_fetch_assoc($result作者);
$autorid = $arr_作者[0][1];
//圖片
$result = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '圖片';");

$workid = $_GET['value'];

$i = 0;
while($row=$result->fetch()){
   $j = 0;
   $arr_圖[$i][$j] = $row['商品編號'];
   ++$j;

   $arr_圖[$i][$j] = $row['會員ID'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品種類'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品名稱'];
   ++$j;

   $arr_圖[$i][$j] = $row['價格'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品數量'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品圖片'];
   
   ++$i;
   $i圖 = $i;
   }
//echo $arr_圖[$i-1][6];

//影片
$result_vedio = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '影片';");

$iv = 0;
while($row=$result_vedio->fetch()){
   $j = 0;
   $arr_影[$iv][$j] = $row['商品編號'];
   ++$j;

   $arr_影[$iv][$j] = $row['會員ID'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品種類'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品名稱'];
   ++$j;

   $arr_影[$iv][$j] = $row['價格'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品數量'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品圖片'];
   
   ++$iv;
   $i影 = $iv;
   }
//echo $iv;
//echo $arr[$iv-1][5];


//漫畫
$result_漫畫 = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '漫畫';");

$im = 0;
while($row=$result_漫畫->fetch()){
   $j = 0;
   $arr_漫[$im][$j] = $row['商品編號'];
   ++$j;

   $arr_漫[$im][$j] = $row['會員ID'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品種類'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品名稱'];
   ++$j;

   $arr_漫[$im][$j] = $row['價格'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品數量'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品圖片'];
   
   ++$im;
   $i漫 = $im;
   }
//echo $im;
//echo $arr_漫[$im-1][6];

//文章
$result_文章 = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '文章';");

$ia = 0;
while($row=$result_文章->fetch()){
   $j = 0;
   $arr_文[$ia][$j] = $row['商品編號'];
   ++$j;

   $arr_文[$ia][$j] = $row['會員ID'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品種類'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品名稱'];
   ++$j;

   $arr_文[$ia][$j] = $row['價格'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品數量'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品圖片'];
   
   ++$ia;
   $i文 = $ia;
   }
//echo $ia;
//echo $arr_文[$ia-1][6];


$sql = "INSERT INTO  購物車(會員ID,產生時間,商品編號) VALUES ('$user_id','" . date("Y/m/d/G/i") . "','$workid')";
$link->query($sql);

//echo "商品已放入購物車";
//重定向瀏覽器
header("Location:buyautor.php");
//確保重定向後，後續程式碼不會被執行
exit;

?>