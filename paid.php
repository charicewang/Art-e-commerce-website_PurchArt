<?php 
mb_internal_encoding("UTF-8");
session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
//echo "<h1>你好 ".$user_icon."</h1>";
mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");
//購物車中有哪些商品
$result = $link->query("select * from 購物車,商品 where 商品.商品編號=購物車.商品編號 AND 購物車.會員ID = $user_id;");

$ca = 0;
while($row=$result->fetch()){
   $j = 0;

   $arr_購[$ca][$j] = $row['會員ID'];
   ++$j;

   $arr_購[$ca][$j] = $row['產生時間'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品編號'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品數量'];
   ++$j;

   $arr_購[$ca][$j] = $row['價格'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品圖片'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品名稱'];
   
   
   ++$ca;
   $i購 = $ca;
   $icou = $ca;
   $cou = $ca-1;
   }
$c = $arr_購[$cou][2];
$c1 = $arr_購[$cou][0];
$cd = $arr_購[$cou][3];

//echo $arr_購[1][5];
//for($c=0;$c<$ca;$c++){
    $sql = "DELETE FROM  購物車 where 商品編號 = $c AND 會員ID = $c1";
    $link->query($sql);
    $sql = "UPDATE  商品 SET 商品數量 = $cd-1 WHERE 商品編號 = $c";
    $link->query($sql);
    echo "購買成功";
//}

?>
