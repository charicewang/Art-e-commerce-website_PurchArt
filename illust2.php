<?php
session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
$user_intro = $_SESSION["intro"];
$user_occu = $_SESSION["occu"];
$temp1 = $_SESSION['temp1'];
$ill2 = $_SESSION['ill2'];
/*$temp3 = $_SESSION['temp3'];
$temp4 = $_SESSION['temp4'];
$temp5 = $_SESSION['temp5'];
$temp6 = $_SESSION['temp6'];*/

//echo $temp1;

mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");

$result作者 = $link->query("select * from 作品, 會員資料 where 作品.會員ID=會員資料.會員ID AND 作品.作品編號 = $ill2;");

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
//echo $arr_作者[0][5];
//圖片
$result = $link->query("select * from 作品, 圖片 where 作品.作品編號=圖片.作品編號 AND 作品.會員ID = $autorid;");


$i = 0;
while($row=$result->fetch()){
   $j = 0;
   $arr_圖[$i][$j] = $row['作品編號'];
   ++$j;

   $arr_圖[$i][$j] = $row['會員ID'];
   ++$j;

   $arr_圖[$i][$j] = $row['作品名稱'];
   ++$j;

   $arr_圖[$i][$j] = $row['作品說明'];
   ++$j;

   $arr_圖[$i][$j] = $row['創造日期'];
   ++$j;

   $arr_圖[$i][$j] = $row['圖片'];
   ++$j;

   $arr_圖[$i][$j] = $row['tags'];
   
   ++$i;
   $i圖 = $i;
   }
//echo $arr[$i-1][5];

//影片
$result_vedio = $link->query("select * from 作品, 影片 where 作品.作品編號=影片.作品編號 AND 作品.會員ID = $autorid;");

$iv = 0;
while($row=$result_vedio->fetch()){
   $j = 0;
   $arr_影[$iv][$j] = $row['作品編號'];
   ++$j;

   $arr_影[$iv][$j] = $row['會員ID'];
   ++$j;

   $arr_影[$iv][$j] = $row['作品名稱'];
   ++$j;

   $arr_影[$iv][$j] = $row['作品說明'];
   ++$j;

   $arr_影[$iv][$j] = $row['創造日期'];
   ++$j;

   $arr_影[$iv][$j] = $row['圖片'];
   ++$j;

   $arr_影[$iv][$j] = $row['tags'];
   
   ++$iv;
   $i影 = $iv;
   }
//echo $iv;
//echo $arr[$iv-1][5];


//漫畫
$result_漫畫 = $link->query("select * from 作品, 漫畫 where 作品.作品編號=漫畫.作品編號 AND 作品.會員ID = $autorid;");

$im = 0;
while($row=$result_漫畫->fetch()){
   $j = 0;
   $arr_漫[$im][$j] = $row['作品編號'];
   ++$j;

   $arr_漫[$im][$j] = $row['會員ID'];
   ++$j;

   $arr_漫[$im][$j] = $row['作品名稱'];
   ++$j;

   $arr_漫[$im][$j] = $row['作品說明'];
   ++$j;

   $arr_漫[$im][$j] = $row['創造日期'];
   ++$j;

   $arr_漫[$im][$j] = $row['圖片'];
   ++$j;

   $arr_漫[$im][$j] = $row['tags'];
   
   ++$im;
   $i漫 = $im;
   }
//echo $im;
//echo $arr[$im-1][5];

//文章
$result_文章 = $link->query("select * from 作品, 文章 where 作品.作品編號=文章.作品編號 AND 作品.會員ID = $autorid;");

$ia = 0;
while($row=$result_文章->fetch()){
   $j = 0;
   $arr_文[$ia][$j] = $row['作品編號'];
   ++$j;

   $arr_文[$ia][$j] = $row['會員ID'];
   ++$j;

   $arr_文[$ia][$j] = $row['作品名稱'];
   ++$j;

   $arr_文[$ia][$j] = $row['作品說明'];
   ++$j;

   $arr_文[$ia][$j] = $row['創造日期'];
   ++$j;

   $arr_文[$ia][$j] = $row['圖片'];
   ++$j;

   $arr_文[$ia][$j] = $row['tags'];
   
   ++$ia;
   $i文 = $ia;
   }
//echo $ia;
//echo $arr[$ia-1][5];
?>

<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<title>purchArt</title>

<!--==============CSS読み込み===============-->
<!--gallery-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
<!--slide_show-->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<!--LOG_IN-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">

<link rel="stylesheet" type="text/css" href="STYLE.css">

</head>
<body>
        <!--font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Raleway:wght@200&display=swap" rel="stylesheet">

    <header id="header">
        <a href="Home_logged_in.php"><h1>purchArt</h1></a>
        <div id="search">
            <img src="magnifying-glass.png">
            <input type="search" placeholder="Search">
        </div>
        <nav>
            <ul>
                <li><a href="#message"><img  class="icon" src="bell.png"></a></li> <!--class="in"-->
                <li class="has-child"><img  class="icon" src="user.png"> <!--class="in"-->
                    <div>
                        <ul>
                            <div class = "pro_icon">
                                <img src="icon1.PNG">
                                <div class="info">
                                    <p>NAME</p>
                                    <p><small>id number</small></p>
                                </div>
                            </div>
                            <div class="flex_container">
                                <div class="number">
                                    <p>00,000</p>
                                    <p><small>followers</small></p>
                                </div>
                                <div class="number">
                                    <p>0,000</p>
                                    <p><small>follows</small></p>
                                </div>
                            </div>
                            <li class="menu"><a href="ABOUT US.php">profile</a></li>
                            <li class="menu"><a href="個人資訊編輯畫面.php">edit profile</a></li>
                            <li class="menu"><a href="work.php">works</a></li>
                            <li class="menu"><a href="編輯畫面.php">add work</a></li>
                            <li class="menu"><a href="buy.php">goods</a></li>
                            <li class="menu"><a href="上架畫面.php">add good</a></li>
                            <li class="menu"><a href="#">bookmark</a></li>
                            <br>
                            <li class="menu"><a href="#">setting</a></li>
                            <li class="menu"><a href="nowhome.php">LOG OUT</a></li>
                            <br>
                        </ul>
                    </div>  
                    
                </li>

                <li><a href="#purchace"><img  class="icon" src="shopping-cart.png"></a></li> <!--class="in"-->
                <button>
                    <div class="openbtn9"><div class="openbtn-area"><span></span><span></span><span></span></div></div>
                </button>
            </ul>
        </nav>
    </header>

    
<section>
    <div>
        <img alt="#插畫" src="<?php echo $arr_作者[0][5]; ?>"  width="350px" style="position:relative; left: 350px ;top: 50px;">

        
        <a href="ABOUT US.php">
        <img src="user.png"  width="40" height="40" alt="會員" style="position: relative; top: 100px; left: 300px;">
        </a><h2 style="position: relative; top: 80px; left: 350px;"><?php echo $arr_作者[0][2]; ?></h2>
        
        <img style="height: 40px; width: 40px; margin-left: 600px; margin-top: 18px;" src="./空愛心.png" alt="" class="love" data-id="作品編號">
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large">
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
            <img  src="share.png"  width="35px" style="position:relative; left: 550px ;top: -42px;">
            </a>
        </div>
        
    </div>

    
</section>

    <div class="content" style="position:relative;left:800px; top: -400px;">
        <div class="title">評論</div>
        <div class="message_box" id="messageBox"></div>
        <div><input id="myInput" type="text" placeholder="請輸入內容"><button id="doPost">  送出</button></div>
    </div>
</body>
    


<footer>

</footer>
   

<script src="jquery-3.6.0.min.js"></script>
<script src="add_follow.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>

$(".love").on("click", function(){
    var index = $(".love").index($(this))
    var love = $(".love").eq(index).attr("src")
    var id = $(".love").eq(index).data("id")
    console.log(love)

    if(love == "./空愛心.png"){
        $(".love").eq(index).attr("src","./紅愛心.png")
    }else{
        $(".love").eq(index).attr("src","./空愛心.png")
    }
})

window.onload = function(){
		
		var oMessageBox = document.getElementById("messageBox");
		var oInput = document.getElementById("myInput");
		var oPostBtn = document.getElementById("doPost");
		
		oPostBtn.onclick = function(){
			if(oInput.value){
				//寫入發表留言的時間
				var oTime = document.createElement("div");
				oTime.className = "time";
				var myDate = new  Date();
				oTime.innerHTML = myDate.toLocaleString();
				oMessageBox.appendChild(oTime);
				
				//寫入留言內容
				var oMessageContent = document.createElement("div");
				oMessageContent.className = "message_content";
				oMessageContent.innerHTML = oInput.value;
				oInput.value = "";
				oMessageBox.appendChild(oMessageContent);
			}
			
		}
		
	}

 </script>
