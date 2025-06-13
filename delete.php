<?php 
    mb_internal_encoding("UTF-8");
    //連結資料庫
    $link = new PDO("mysql:dbname=purchart;host=localhost","root","");
    $check=$_POST['checkbox'];
    //print_r($check);
    //echo "返回作品頁面"
    foreach($check as $value){
        $sql = "DELETE FROM  作品 where 作品編號 = $value";
        $link->query($sql);}
    echo "<a href='work.php'>返回作品頁面</a>"
?>
