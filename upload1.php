<?php

session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
/**
 * 表單接收頁面
 */
// 網頁編碼宣告（防止產生亂碼）
mb_internal_encoding("UTF-8");
//header('content-type:text/html;charset=utf-8');
// 封裝好的 PHP 多檔案上傳 function
include_once 'upload1.func.php';
// 重新建構上傳檔案 array 格式
$files = getFiles();
 
// 依上傳檔案數執行
foreach ($files as $fileInfo) {
    // 呼叫封裝好的 function
    $res = uploadFile($fileInfo);
 
    // 顯示檔案上傳訊息
    echo $res['mes'] . '<br>';
 
    // 上傳成功，將實際儲存檔名存入 array（以便存入資料庫）
    if (!empty($res['dest'])) {
        $uploadFiles[] = $res['dest'];
    }
}
 
print_r($uploadFiles);

//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");

//定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
$nickname = $_POST["暱稱"];
$intro = $_POST["說明"];
$memberid = $_POST["ID"];
$mail = $_POST["信箱"];
$birthday = $_POST["生日"];
$country = $_POST["country"];
$job = $_POST["job"];
$PID = $_POST["pID"];
$phone = $_POST["phone_number"];

if(isset($_POST['upload'])){
    $countfiles = count($uploadFiles);
    for($i=0;$i<$countfiles;$i++){
        $filename = $uploadFiles[$i];
        $sql = "UPDATE  會員資料 SET 姓名 = '$nickname', 說明 = '$intro', 信箱 = '$mail', 職業 = '$job', 頭像圖片 = '$filename', 手機號碼 = '$phone', 身分證字號 = '$PID', 地址 = '$country' WHERE 會員ID = $user_id";/*(會員ID,身分證字號,手機號碼,信箱,姓名,職業,地址,說明,頭像圖片,追蹤,密碼) VALUES ('','$user_id','$workname','$intro','" . date("Y/m/d") . "','$filename','$tags')*/
        $link->query($sql);
    }
}

?>