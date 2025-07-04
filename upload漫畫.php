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
include_once 'upload.func.php';
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
$intro = $_POST["intro"];
$tags = $_POST["tag"];

if(isset($_POST['upload'])){
    $countfiles = count($uploadFiles);
    for($i=0;$i<$countfiles;$i++){
        $filename = $uploadFiles[$i];
        $sql = "INSERT INTO  作品(作品編號,會員ID,作品名稱,作品說明,創造日期,圖片,tags) VALUES ('','$user_id','$workname','$intro','" . date("Y/m/d") . "','$filename','$tags')";
        $link->query($sql);
        //取出作品編號
        $result = $link->query("select * from 作品");

        $icount = 0;
        while($row=$result->fetch()){
            $j = 0;
            $arr[$icount][$j] = $row['作品編號'];
            ++$j;

            $arr[$icount][$j] = $row['會員ID'];
            ++$j;

            $arr[$icount][$j] = $row['作品名稱'];
            ++$j;

            $arr[$icount][$j] = $row['作品說明'];
            ++$j;

            $arr[$icount][$j] = $row['創造日期'];
            ++$j;

            $arr[$icount][$j] = $row['圖片'];
            ++$j;

            $arr[$icount][$j] = $row['tags'];
   
            ++$icount;
        }
        $workid = $arr[$icount-1][0];
        $sql = "INSERT INTO  漫畫(作品編號) VALUES ('$workid')";
        $link->query($sql);
        //move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
    }
}

?>