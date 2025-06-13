<?php 
// Include config file
mb_internal_encoding("UTF-8");
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'purchart';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    echo "正確連接資料庫";
}

else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
 
// Define variables and initialize with empty values
$username=$_POST["e-mail"];
$password=$_POST["password"];
//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM 會員資料 WHERE 信箱 ='".$username."'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)==1 && $password==$row['密碼']){

        session_start();
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        //這些是之後可以用到的變數
        $_SESSION["id"] = $row['會員ID'];
        $_SESSION["icon"] = $row['頭像圖片'];
        $_SESSION["name"] = $row['姓名'];
        $_SESSION["intro"] = $row['說明'];
        $_SESSION["occu"] = $row['職業'];
        //$_SESSION["username"] = mysqli_fetch_assoc($result)["密碼"];
        header("location:home_logged_in.php");
    }else{
            function_alert("帳號或密碼錯誤"); 
        }
}
    else{
        function_alert("Something wrong"); 
    }

    // Close connection
    mysqli_close($link);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index1.php';
    </script>"; 
    return false;
} 
 ?>