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
include_once 'add.func.php';
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
/*$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'purchart';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}*/
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");

//定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
$workname = $_POST["標題"];
$coin = $_POST["coin"];
$stock = $_POST["stock"];

if(isset($_POST['upload'])){
    $countfiles = count($uploadFiles);
    for($i=0;$i<$countfiles;$i++){
        $filename = $uploadFiles[$i];
        $sql = "INSERT INTO  商品(商品編號,會員ID,商品種類,商品名稱,價格,商品數量,商品圖片) VALUES ('','$user_id','漫畫','$workname','$coin','$stock','$filename')";
        $link->query($sql);
    }
}

?>