<?php
mb_internal_encoding("UTF-8");
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'purchart';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
mysqli_query($link, 'SET NAMES utf8');
/*if($link){
    echo "正確連接資料庫";
}

else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}*/

if($_SERVER["REQUEST_METHOD"]=="POST"){
    mb_internal_encoding("UTF-8");
    $username=$_POST["username"];
    $email=$_POST["ID"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check="SELECT * FROM 會員資料 WHERE 信箱='".$email."'";
    if(mysqli_num_rows(mysqli_query($link,$check))==0){
        $sql = "INSERT INTO  會員資料(會員ID,身分證字號,手機號碼,信箱,姓名,職業,地址,說明,頭像圖片,追蹤,密碼) VALUES ('','','','".$email."','".$username."','','','','','','".$password."') ";
        
        if(mysqli_query($link, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='nowhome.php'>未成功跳轉頁面請點擊此</a>";
            header('refresh:3; url=nowhome.php');
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($link);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='nowhome.php'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        header("refresh:3;url=nowhome.php",true);
        exit;
    }
}


mysqli_close($link);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index1.php';
    </script>"; 
    
    return false;
} 
?>