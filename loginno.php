<?php

$db = new PDO("mysql:dbname=mis_team_7; host=140.117.79.65", "mis_team_7", "ukiodfw4");
if(!$db){
    die("連接失敗");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["ID"];
    $pass = $_POST["password"];
    $rows = $db->query("SELECT * FROM user");
    $count=0;

    foreach ($rows as $row){
        if($user==$row['user_id']){
            $count++;
            if($pass==$row['password']){
                header("location: TravelBlog_logged_in.html");
            }
            else{
                print("密碼錯誤!");
                break;
            }
        } 
    }
    if($count==0){
        print("查無此人!");
    }
    

}

