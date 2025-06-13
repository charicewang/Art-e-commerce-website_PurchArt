<?php


session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
//echo "<h1>你好 ".$user_icon."</h1>";
mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");

$result_good = $link->query("select * from 商品 where 商品種類 = '漫畫' OR 商品種類 = '圖片';");
$h=0;
$h1=0;
$h2=0;

$icar = 0;
while($row=$result_good->fetch()){
   $j = 0;
   $arr_商[$icar][$j] = $row['商品編號'];
   ++$j;

   $arr_商[$icar][$j] = $row['會員ID'];
   ++$j;

   $arr_商[$icar][$j] = $row['商品種類'];
   ++$j;

   $arr_商[$icar][$j] = $row['商品名稱'];
   ++$j;

   $arr_商[$icar][$j] = $row['價格'];
   ++$j;

   $arr_商[$icar][$j] = $row['商品數量'];
   ++$j;

   $arr_商[$icar][$j] = $row['商品圖片'];
   
   ++$icar;
   $i商 = $icar;
   }
//echo $arr_圖[$i-1][6];
//把作品和圖片分類結合起來做一個作品分類為圖片的區塊
//圖片
$result = $link->query("select * from 作品, 圖片 where 作品.作品編號=圖片.作品編號;");

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
$result_vedio = $link->query("select * from 作品, 影片 where 作品.作品編號=影片.作品編號;");

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
   }
//echo $iv;
//echo $arr[$iv-1][5];


//漫畫
$result_漫畫 = $link->query("select * from 作品, 漫畫 where 作品.作品編號=漫畫.作品編號;");

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
   }
//echo $im;
//echo $arr[$im-1][5];

//文章
$result_文章 = $link->query("select * from 作品, 文章 where 作品.作品編號=文章.作品編號;");

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

<style>
    .love {
        font-size: 20px;
    }
</style>

</head>

<body>
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Raleway:wght@200&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

    <header id="header">
        <h1>purchArt</h1>
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
                                <img src="<?php echo $user_icon; ?>">
                                <div class="info">
                                    <p><?php echo $user_name; ?></p>
                                    <p><small>id:<?php echo $user_id; ?></small></p>
                                </div>
                            </div>
                            <!--<div class="flex_container">
                                <div class="number">
                                    <p>00,000</p>
                                    <p><small>followers</small></p>
                                </div>
                                <div class="number">
                                    <p>0,000</p>
                                    <p><small>follows</small></p>
                                </div>
                            </div>-->
                            <li class="menu"><a href="ABOUT US.php">profile</a></li>
                            <li class="menu"><a href="個人資訊編輯畫面.php">edit profile</a></li>
                            <li class="menu"><a href="work.php">works</a></li>
                            <li class="menu"><a href="編輯畫面.php">add work</a></li>
                            <li class="menu"><a href="buy.php">goods</a></li>
                            <li class="menu"><a href="上架畫面.php">add good</a></li>
                            <!--<li class="menu"><a href="#">bookmark</a></li>-->
                            <br>
                            <li class="menu"><a href="#">setting</a></li>
                            <li class="menu"><a href="nowhome.php">LOG OUT</a></li>
                            <br>
                        </ul>
                    </div>  
                    
                </li>

                <li><a href="car2.php"><img  class="icon" src="shopping-cart.png"></a></li> <!--class="in"-->
                <button>
                    <div class="openbtn9"><div class="openbtn-area"><span></span><span></span><span></span></div></div>
                </button>
            </ul>
        </nav>
    </header>

    <main>
        <!--section 1-->
        <section id="big_pic">
            <div class="text">
                <h1>purchArt</h1>
                <blockquote>
                        purchase your favorite art
                </blockquote>
            </div>
        </section>

        <!--最新貼文-->
        <section id="latest">
            <!--video-->
            <h1 class="section" id="section">video</h1>
                <ul class="slider" id="newvideo">                    
                    <li><video id="movie" controls="autoplay" preload="auto" style="display: block; width: 400px; height: 300px">
                        <source src="<?php echo $arr_影[--$iv][5]; ?>" type="video/mp4" />
                        </video><p><?php echo $arr_影[$iv][2]; ?></p>
                        <?php
                            $_SESSION["temp1"]=$arr_影[$iv][0];
                        ?>
                        <div style="text-decoration:underline;">
                            <a href="autor.php">
                                see the autor
                            </a>                        
                        </div></li>                 
                    <li><video id="movie" controls="autoplay" preload="auto" style="display: block; width: 400px; height: 300px">
                        <source src="<?php echo $arr_影[--$iv][5]; ?>" type="video/mp4" />
                        </video><p><?php echo $arr_影[$iv][2]; ?></p>
                        <?php
                            $_SESSION["temp2"]=$arr_影[$iv][0];
                        ?>
                        <div style="text-decoration:underline;">
                            <a href="autor.php">
                                see the autor
                            </a>                        
                        </div></li>                  
                    <li><video id="movie" controls="autoplay" preload="auto" style="display: block; width: 400px; height: 300px">
                        <source src="<?php echo $arr_影[--$iv][5]; ?>" type="video/mp4" />
                        </video><p><?php echo $arr_影[$iv][2]; ?></p>
                        <?php
                            $_SESSION["temp3"]=$arr_影[$iv][0];
                        ?>
                        <div style="text-decoration:underline;">
                            <a href="autor.php">
                                see the autor
                            </a>                        
                        </div></li>   
                    <li><video id="movie" controls="autoplay" preload="auto" style="display: block; width: 400px; height: 300px">
                        <source src="<?php echo $arr_影[--$iv][5]; ?>" type="video/mp4" />
                        </video><p><?php echo $arr_影[$iv][2]; ?></p>
                        <?php
                            $_SESSION["temp4"]=$arr_影[$iv][0];
                        ?>
                        <div style="text-decoration:underline;">
                            <a href="autor.php">
                                see the autor
                            </a>                        
                        </div></li>   
                    <li><video id="movie" controls="autoplay" preload="auto" style="display: block; width: 400px; height: 300px">
                        <source src="<?php echo $arr_影[--$iv][5]; ?>" type="video/mp4" />
                        </video><p><?php echo $arr_影[$iv][2]; ?></p>
                        <?php
                            $_SESSION["temp5"]=$arr_影[$iv][0];
                        ?>
                        <div style="text-decoration:underline;">
                            <a href="autor.php">
                                see the autor
                            </a>                        
                        </div></li>   
                    <li><video id="movie" controls="autoplay" preload="auto" style="display: block; width: 400px; height: 300px">
                        <source src="<?php echo $arr_影[--$iv][5]; ?>" type="video/mp4" />
                        </video><p><?php echo $arr_影[$iv][2]; ?></p>
                        <?php
                            $_SESSION["temp6"]=$arr_影[$iv][0];
                        ?>
                        <div style="text-decoration:underline;">
                            <a href="autor.php">
                                see the autor
                            </a>                        
                        </div></li>   
                    <!--/slider--></ul>


            <h1 class="section">ranking</h1>
                <ul class="slider">
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="<?php echo $arr_圖[--$i][5]; ?>" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="<?php echo $arr_圖[$i][5]; ?>" alt="">
                        </a>
                    </div>
                    <p><?php echo $arr_圖[$i][2]; ?></p>
                    <div style="text-decoration:underline;">
                        <a href="autor.php">
                            see the autor
                        </a>                        
                    </div>
                </div>
            </ul>

            <!--GALLERY-->
            <div>
                <h1>Osusume</h1>
                <div id="work_type" class="flex_container">
                    <ul class="sort-btn">
                        <li class="sort00 active">ALL</li>
                        <li class="sort01">illust</li>
                        <li class="sort02">comic</li>
                        <li class="sort03">novel</li>
                    </ul>
                </div>
                    
                    <ul class="grid"><!--1番外側のタグにgrid というクラス名を付与。-->
                    <li class="item sort01"><!--li には、item というクラス名と並び替え基準となるクラス名（ボタンのクラス名と同じ名前）を付与。-->

                    <div class="item-content" id="item-content">
                        <div class="blog">
                            <div class= "pic">
                                <a href="illust.php">
                                    <img src="<?php echo $arr_圖[$h][5]; ?>" alt="">
                                </a>
                                <?php
                                    $_SESSION["ill1"]=$arr_圖[$h][0];
                                ?>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="./空愛心.png" alt="" class="love" data-id="作品編號">
                            <script>

                                $(".love").on("click", function(){
                                var index = $(".love").index($(this))
                                var love = $(".love").eq(index).attr("src")
                                var id = $(".love").eq(index).data("id")
                                console.log("點到ㄌ")
                                console.log(love)

                                if(love == "./空愛心.png"){
                                    $(".love").eq(index).attr("src","./紅愛心.png")
                                }else{
                                    $(".love").eq(index).attr("src","./空愛心.png")
                                }})
                            </script>        
                            <p><?php echo $arr_圖[$h++][2]; ?></p>
                            
                        </div>
                        

                        <div class="blog">
                            <div class= "pic">
                                <a href="illust2.php">
                                    <img src="<?php echo $arr_圖[$h][5]; ?>" alt="">
                                </a>
                                <?php
                                    $_SESSION["ill2"]=$arr_圖[$h][0];
                                ?>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love1">        
                            <script>
                                $("#love1").on("click", function(){
                            var love1 = $("#love1").attr("src")
                    
                            if(love1 == "./空愛心.png"){
                                $("#love1").attr("src","./紅愛心.png")
                            }else{
                                $("#love1").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                                <p><?php echo $arr_圖[$h++][2]; ?></p>
                        </div>
                        
                        <div class="blog">
                            <div class= "pic">
                                <a href="illust3.php">
                                    <img src="<?php echo $arr_圖[$h][5]; ?>" alt="">
                                </a>
                                <?php
                                    $_SESSION["ill3"]=$arr_圖[$h][0];
                                ?>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love2">        
                            <script>
                                $("#love2").on("click", function(){
                            var love = $("#love2").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love2").attr("src","./紅愛心.png")
                            }else{
                                $("#love2").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_圖[$h++][2]; ?></p>
                        </div>

                        <div class="blog">
                            <div class= "pic">
                                <a href="illust4.php">
                                    <img src="<?php echo $arr_圖[$h][5]; ?>" alt="">
                                </a>
                                <?php
                                    $_SESSION["ill4"]=$arr_圖[$h][0];
                                ?>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love3">        
                            <script>
                                $("#love3").on("click", function(){
                            var love = $("#love3").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love3").attr("src","./紅愛心.png")
                            }else{
                                $("#love3").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_圖[$h++][2]; ?></p>
                        </div>


                    
                    <!--複数画像をグループ化してサムネ
                    イル表示させたい場合は、datafancybox="半角英数字で同一のグループ名"、キャプションを入れたい場合はdata-caption="キャプションタイトル"を設定する。-->
                    </div>

                    </li>
                    <li class="item sort02">
                    <div class="item-content" id="item-content2">
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="<?php echo $arr_漫[$h1][5]; ?>" alt="">
                                </a>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love4">        
                            <script>
                                $("#love4").on("click", function(){
                            var love = $("#love4").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love4").attr("src","./紅愛心.png")
                            }else{
                                $("#love4").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_漫[$h1++][2]; ?></p>
                        </div>
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="<?php echo $arr_漫[$h1][5]; ?>" alt="">
                                </a>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love5">        
                            <script>
                                $("#love5").on("click", function(){
                            var love = $("#love5").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love5").attr("src","./紅愛心.png")
                            }else{
                                $("#love5").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_漫[$h1++][2]; ?></p>
                        </div>
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="<?php echo $arr_漫[$h1][5]; ?>" alt="">
                                </a>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love6">        
                            <script>
                                $("#love6").on("click", function(){
                            var love = $("#love6").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love6").attr("src","./紅愛心.png")
                            }else{
                                $("#love6").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_漫[$h1++][2]; ?></p>
                        </div>
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="<?php echo $arr_漫[$h1][5]; ?>" alt="">
                                </a>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love7">        
                            <script>
                                $("#love7").on("click", function(){
                            var love = $("#love7").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love7").attr("src","./紅愛心.png")
                            }else{
                                $("#love7").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_漫[$h1++][2]; ?></p>
                        </div>
                    </div>
                    </li>
                    <li class="item sort03">
                    <div class="item-content">
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="<?php echo $arr_文[0][5]; ?>" alt="">
                                </a>
                            </div>
                            <img style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;" src="空愛心.png" alt="" id="love8">        
                            <script>
                                $("#love8").on("click", function(){
                            var love = $("#love8").attr("src")
                    
                            if(love == "./空愛心.png"){
                                $("#love8").attr("src","./紅愛心.png")
                            }else{
                                $("#love8").attr("src","./空愛心.png")
                                }
                            })
                            </script>
                            <p><?php echo $arr_文[0][2]; ?></p>
                        </div>
                    </div>
                    </li>
                    </ul>
                    
            </div>

            <!--<h1 class="section">follow_user</h1>
            <ul class="slider">
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
                <div>
                    <div class= "pic">
                        <a href="U5A.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                            <img src="U5A.jpg" alt="">
                        </a>
                    </div>
                    <p>title</p>
                    <div>
                        icon&name
                    </div>
                </div>
            </ul>-->

        </section>

        <!--地圖：點擊台灣會跳到貼文串的最上方，點擊其他地區則會到貼文串相應的地區-->
        <section id="map">
            <h2>Wanna buy some stuff?</h2>
            <div id="search">
                <img src="magnifying-glass.png">
                <input type="search" placeholder="Surch your favorite artist">
            </div>

            <div class= "flex_container">
                <div class= "place">
                    <a href="#log_in" class="modal-open">
                        <div>
                            <img style="width: 250px;height: 250px;" src= "<?php echo $arr_商[--$i商][6]; ?>">
                        </div>
                        <p><?php echo $arr_商[$i商][3]; ?></p>
                    </a>        
                </div>

                <div class= "place">
                    <a href="#log_in" class="modal-open">
                        <div>
                            <img style="width: 250px;height: 250px;" src= "<?php echo $arr_商[--$i商][6]; ?>">
                        </div>
                        <p><?php echo $arr_商[$i商][3]; ?></p> 
                    </a>        
                </div>

                <div class= "place">
                    <a href="#log_in" class="modal-open">
                        <div>
                            <img style="width: 250px;height: 250px;" src= "<?php echo $arr_商[--$i商][6]; ?>">
                        </div>
                        <p><?php echo $arr_商[$i商][3]; ?></p>
                    </a>
                </div>

                <div class= "place">
                    <a href="#log_in" class="modal-open">
                        <div>
                            <img style="width: 250px;height: 250px;" src= "<?php echo $arr_商[--$i商][6]; ?>">
                        </div>  
                        <p><?php echo $arr_商[$i商][3]; ?></p>
                    </a>
                </div>

                <div class= "place">
                    <a href="#log_in" class="modal-open">
                        <div>
                            <img style="width: 250px;height: 250px;" src= "<?php echo $arr_商[--$i商][6]; ?>">
                        </div>
                        <p><?php echo $arr_商[$i商][3]; ?></p>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!--頁尾-->
    <footer>
        <p>designed by @Ning Chien</p>
        <!--按下去會回到最上方的小箭頭-->
        <a href="#top" id="back_to_top">
            <img src= "up.png">
        </a>
    </footer>

    <script src="jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--GALLERY-->
    <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
    <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!--SLIDE_SHOW-->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!--LOG IN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script src="login_motion.js"></script>

    <script src="js.js"></script>
</body>
</html>

<?php

$arr_圖 = json_encode($arr_圖);

?>

<script>
            var arr_圖 = <?php echo $arr_圖?>;
            let cou = <?=$i圖?>;
            //console.log(cou);
            let a = 0;
            let b = 0;
            let i = 0;
            let i1 = 0;
            let j1 = 0;
            let lo = 0;
            document.addEventListener("DOMContentLoaded", () => {
                let options = {
                root: null,
                rootMargins: "0px",
                threshold: 0.5
                };
                const observer = new IntersectionObserver(handleIntersect, options);
                observer.observe(document.querySelector("footer"));                  
            });
            /*for(a=0;a<cou;a++){
                getData();
            }*/
            /*function handleIntersect(entries) {
              if (entries[0].isIntersecting&&i<cou) {
                getData();
              }
            }*/

            function getData() {
                //for(a=0;a<2;a++){
                    // 建立一個 DocumentFragment，可以把它看作一個「虛擬的容器」
                    var div = document.getElementById("item-content");
                    var fragment = document.createDocumentFragment();
                    let div1 = document.createElement("div");
                    div1.className = "blog";
                    let div2 = document.createElement("div");
                    div2.className = "pic";
                    let a = document.createElement("a");
                    a.href = arr_圖[i1][5];
                    let img = document.createElement("img");
                    img.src = arr_圖[i1][5];
                    a.appendChild(img);
                    div2.appendChild(a);
                    div1.appendChild(div2);
                    let img2 = document.createElement("img");
                    img2.style="height: 20px; width: 20px; margin-left: 200px; margin-top: 12px;";
                    img2.src = "空愛心.png";
                    img2.id=`love${++lo}`;
                    console.log(img2.id);
                    div1.appendChild(img2);
                    let p = document.createElement("p");
                    p.textContent = arr_圖[i1][2];
                    div1.appendChild(p);
                    fragment.appendChild(div1);
                    div.appendChild(fragment);
                    i++;
                    i1++;
                }
            //}
      
</script>
                                 
<script>
//console.log(b);
    /*for(b=1;b<=lo;b++){
        var name = "#love" + b;
        $(`#love${b}`).on("click", function(){
        var love = $(`#love${b}`).attr("src")
        if(love == "./空愛心.png"){
            $(`#love${b}`).attr("src","./紅愛心.png")
        }else{
            $(`#love${b}`).attr("src","./空愛心.png")
        }
         })}
         console.log(name);*/
</script>
                 