<?php 
    mb_internal_encoding("UTF-8");
    //連結資料庫
    $link = new PDO("mysql:dbname=purchart;host=localhost","root","");
    $check=$_POST['checkbox2'];
    //print_r($check);
    //echo "返回作品頁面"
    foreach($check as $value){
        $sql = "DELETE FROM  購物車 where 商品編號 = $value";
        $link->query($sql);}
    echo "<a href='car.php'>返回購物車</a>"
?>
