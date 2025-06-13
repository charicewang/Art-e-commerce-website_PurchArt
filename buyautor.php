<?php
session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
$user_intro = $_SESSION["intro"];
$user_occu = $_SESSION["occu"];
$temp1 = $_SESSION['temp1'];

mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");

$result作者 = $link->query("select * from 作品, 會員資料 where 作品.會員ID=會員資料.會員ID AND 作品.作品編號 = $temp1;");

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
//商品對應的作者
$autorid = $arr_作者[0][1];
//圖片
$result = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '圖片';");

$i = 0;
while($row=$result->fetch()){
   $j = 0;
   $arr_圖[$i][$j] = $row['商品編號'];
   ++$j;

   $arr_圖[$i][$j] = $row['會員ID'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品種類'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品名稱'];
   ++$j;

   $arr_圖[$i][$j] = $row['價格'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品數量'];
   ++$j;

   $arr_圖[$i][$j] = $row['商品圖片'];
   
   ++$i;
   $i圖 = $i;
   }
//echo $arr_圖[$i-1][6];

//影片
$result_vedio = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '影片';");

$iv = 0;
while($row=$result_vedio->fetch()){
   $j = 0;
   $arr_影[$iv][$j] = $row['商品編號'];
   ++$j;

   $arr_影[$iv][$j] = $row['會員ID'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品種類'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品名稱'];
   ++$j;

   $arr_影[$iv][$j] = $row['價格'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品數量'];
   ++$j;

   $arr_影[$iv][$j] = $row['商品圖片'];
   
   ++$iv;
   $i影 = $iv;
   }
//echo $iv;
//echo $arr[$iv-1][5];


//漫畫
$result_漫畫 = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '漫畫';");

$im = 0;
while($row=$result_漫畫->fetch()){
   $j = 0;
   $arr_漫[$im][$j] = $row['商品編號'];
   ++$j;

   $arr_漫[$im][$j] = $row['會員ID'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品種類'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品名稱'];
   ++$j;

   $arr_漫[$im][$j] = $row['價格'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品數量'];
   ++$j;

   $arr_漫[$im][$j] = $row['商品圖片'];
   
   ++$im;
   $i漫 = $im;
   }
//echo $im;
//echo $arr_漫[$im-1][6];

//文章
$result_文章 = $link->query("select * from 商品 where 會員ID = $autorid AND 商品種類 = '文章';");

$ia = 0;
while($row=$result_文章->fetch()){
   $j = 0;
   $arr_文[$ia][$j] = $row['商品編號'];
   ++$j;

   $arr_文[$ia][$j] = $row['會員ID'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品種類'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品名稱'];
   ++$j;

   $arr_文[$ia][$j] = $row['價格'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品數量'];
   ++$j;

   $arr_文[$ia][$j] = $row['商品圖片'];
   
   ++$ia;
   $i文 = $ia;
   }
//echo $ia;
//echo $arr_文[$ia-1][6];
?>

<!DOCTYPE html>
<!--介紹組員的頁面-->
<html>
    <head>
        <title>purchArt</title>
        <meta charset="utf-8">

        <!--gallery-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

        <!--pop up-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">

        <link href="ABOUT_style.css" rel="stylesheet">

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
                <li><a href="#message"><img  class="icon" src="bell.png"></a></li> 
                <li><a href="car.php"><img  class="icon" src="shopping-cart.png"></a></li>
                <button>
                    <div class="openbtn9"><div class="openbtn-area"><span></span><span></span><span></span></div></div>
                </button>
            </ul>
        </nav>
    </header>

        <main>
            <!--介紹-->
            <section>
                <div id="pro_pic"></div>

                <div class="member">
                    <div class = "profile">
                        <img src= "<?php echo $arr_作者[0][8]; ?>">
                    </div>

                    <!--成員1介紹-->
                    <div class="profile-content">
                            <h1><?php echo $arr_作者[0][7]; ?></h1><br>
                            <div class="follow_btn" style="float: right;">
                                <button id="follow" name="add" onclick="Add_follow()"><img src="add.png" title="追蹤">follow</button>
                                <button id="cancel_follow" name="remove" class="hide" onclick="cancel_follow()"><img src="add-friend.png" title="取消追蹤">remove</button>
                            </div>
                            <div class="media">
                                <a href="https://www.instagram.com/citygirl0319/?hl=ja">
                                   <img src="instagram (1).png"> 
                                </a>
                                <a href="https://www.facebook.com/profile.php?id=100010029331792">
                                    <img src="facebook (1).png"> 
                                </a>
                                <a href="https://twitter.com/Cn_thirteen">
                                    <img src="twitter.png"> 
                                </a>
                            </div>

                            <div class="paragraph">
                                <p>
                                    <!--一名普通的大學生。<br>
                                    目前就讀台灣國立中山大學資訊管理學系。-->
                                    <?php echo $arr_作者[0][9]; ?>
                                </p>

                                <div style="text-align:  center; margin:0%;">
                                    <div style="width: 75%; margin: 0%;">
                                        <a href="#full_profile" class="modal-open more">MORE</a>
                                    </div> 
                                    <section id="full_profile">
                                            <section class="basic">
                                                <div class = "fu_icon">
                                                    <img src= "icon1.PNG">
                                                </div>
                                                <div class="flex_container">
                                                    <h3 style="margin: 3%; width: fit-content;"><?php echo $arr_作者[0][7]; ?></h3>
                                                </div>
                                                <div class="media">
                                                    <a href="https://www.instagram.com/citygirl0319/?hl=ja">
                                                       <img src="instagram (1).png"> 
                                                    </a>
                                                    <a href="https://www.facebook.com/profile.php?id=100010029331792">
                                                        <img src="facebook (1).png"> 
                                                    </a>
                                                    <a href="https://twitter.com/Cn_thirteen">
                                                        <img src="twitter.png"> 
                                                    </a>
                                                </div>

                                                <div class="follow_btn">
                                                    <button id="add" name="add" onclick="Add_follow()"><img src="add.png" title="追蹤">follow</button>
                                                    <button id="cancel" name="remove" class="hide" onclick="cancel_follow()"><img src="add-friend.png" title="取消追蹤">remove</button>
                                                </div>
                                            </section>
                                            <div>
                                                願意公開的基本情報
                                            </div>
                                            <div class="fu_caption">
                                                   <P>職業:<?php echo $arr_作者[0][10]; ?><br>
                                                   </P>
                                            </div>
                                    </section>
                                </div>
                                
                            </div>
                    </div>
                    
            </section>

            <section id="work">
                <div class="big_tab">
                    <div class="tabs">
                        <div style="margin-left: 22%; width: 78%;">
                            <ul class="tabs" class="flex_container">
                                <li><a href="#tab_1" title="illust"><p>illust</p></a></li>
                                <li><a href="#tab_2" title="comics"><p>comics</p></a></li>
                                <li><a href="#tab_3" title="animation"><p>animatioin</p></a></li>
                                <li><a href="#tab_4" title="novel"><p>novel</p></a></li>
                            </ul>
                        </div>
                    </div>
                   <!--插圖-->
                <form method="post" name="form1" id="form1" action="delete.php">    
                   <div class="tab_container">                     
                        <div id="tab_1" class="tab_content">
                            <div class="flex_container" id="imgtest">                                                      
                                        <!--<div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="<?php //echo $arr_圖[--$i][5]; ?>" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="<?php //echo $arr_圖[$i][0]; ?>" id="checkbox_0" />title</p>                                   
                                        </div>

                                        <div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="<?php //echo $arr_圖[--$i][5]; ?>" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="<?php// echo $arr_圖[$i][0]; ?>" id="checkbox_1" />title</p>
                                        </div>

                                        <div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="<?php //echo $arr_圖[--$i][5]; ?>" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="<?php //echo $arr_圖[$i][0]; ?>" id="checkbox_2" />title</p>
                                        </div>

                                        <div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="nice boi.jpg" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="公車" id="checkbox_3" />title</p>
                                        </div>

                                        <div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="nice boi.jpg" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="嗨" id="checkbox_4" />title</p>
                                        </div>

                                        <div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="nice boi.jpg" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="嗨1" id="checkbox_5" />title</p>
                                        </div>

                                        <div class="blog">
                                            <div class= "pic">
                                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                                    <img src="nice boi.jpg" alt="">
                                                </a>
                                            </div>
                                            <p><input type="checkbox" name="checkbox[]" value="嗨嗨" id="checkbox_6" />title</p>
                                        </div>--> 
                                                                                                                                                                       
                               </div>                             
                        </div>
                          
    
                        <!--漫畫-->
                        <div id="tab_2" class="tab_content">
                            <div class="flex_container" id="comictest">
                                <!--<div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="<?php //echo $arr_漫[--$im][5]; ?>" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>
    
                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="<?php //echo $arr_漫[--$im][5]; ?>" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>
    
                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="nice boi.jpg" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>
    
                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="nice boi.jpg" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>
    
                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="nice boi.jpg" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>

                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="nice boi.jpg" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>

                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="nice boi.jpg" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>

                                <div class="blog">
                                    <div class= "pic">
                                        <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                            <img src="nice boi.jpg" alt="">
                                        </a>
                                    </div>
                                    <p>title</p>
                                </div>-->
                            </div>
                        </div>
    
                    <!--動畫-->
                        <div id="tab_3" class="tab_content">
                            <div class="flex_container" id="videotest">

                            </div>
                        </div> 
    
                        <!--小說-->
                        <div id="tab_4" class="tab_content novel">
                            <div class="flex_container" id="articaltest">

                            </div>
                        
                        </div>
                    </div>
                   </section>
                </div>
</form>



        </main>

        <!--頁尾-->
        <footer>
            <p>designed by @Ning Chien</p>
        </footer>
        
        <script src="jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
        <!--GALLERY-->
        <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
        <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

        <!--pop up-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
        <script src="tobidasi.js"></script>

        <script src="編輯java.js"></script>
        <script src="add_follow.js"></script>
        <script src="js.js"></script>
    </body>
</html>

<!--頭像使用手機App"アイコンファクトリー"製作-->

<?php

$arr_圖 = json_encode($arr_圖);
$arr_影 = json_encode($arr_影);
$arr_漫 = json_encode($arr_漫);
$arr_文 = json_encode($arr_文);


?>

<script>
            var arr_圖 = <?php echo $arr_圖?>;
            var arr_漫 = <?php echo $arr_漫?>;
            var arr_影 = <?php echo $arr_影?>;
            var arr_文 = <?php echo $arr_文?>;
    
            let cou_圖 = <?=$i圖?>;
            let cou_漫 = <?=$i漫?>;
            let cou_影 = <?=$i影?>;
            let cou_文 = <?=$i文?>;
            let lo = 0;
            let a = 0;
            let i = 0;
            let i1 = 0;
            let icomic = 0;
            let iartical = 0;
            let ivideo = 0;
            let j1 = 0;
            document.addEventListener("DOMContentLoaded", () => {
                let options = {
                root: null,
                rootMargins: "0px",
                threshold: 0.5
                };
                const observer = new IntersectionObserver(handleIntersect, options);
                observer.observe(document.querySelector("footer"));                  
            });

            for(a=0;a<cou_圖;a++){
                getData_圖();
            }

            for(a=0;a<cou_漫;a++){
                getData_漫();
            }

            for(a=0;a<cou_影;a++){
                getData_影();
            }

            for(a=0;a<cou_文;a++){
                getData_文();
            }

            

            /*unction handleIntersect(entries) {
              if (entries[0].isIntersecting&&i<cou) {
                getData();
              }
            }*/

            function getData_圖() {
                    // 建立一個 DocumentFragment，可以把它看作一個「虛擬的容器」
                    var div = document.getElementById("imgtest");
                    var fragment = document.createDocumentFragment();
                    let div1 = document.createElement("div");
                    div1.className = "blog";
                    let div2 = document.createElement("div");
                    div2.className = "pic";
                    let a = document.createElement("a");
                    a.href = arr_圖[i1][6];
                    //a.data-fancybox = group1;
                    //a.data-caption = "グループ1キャプション";
                    let img = document.createElement("img");
                    img.src = arr_圖[i1][6];
                    img.style.cssText += 'filter: blur(5px)';
                    a.appendChild(img);
                    div2.appendChild(a);
                    div1.appendChild(div2);
                    let p = document.createElement("p");
                    p.textContent = arr_圖[i1][3];
                    let a2 = document.createElement("a");
                    a2.href = "buyautor_func.php?value=" +arr_圖[i1][0];
                    let img2 = document.createElement("img");
                    img2.src = "shopping-cart.png";
                    img2.style = "height: 20px; width: 20px; margin-left: 200px; margin-top: 0px;"
                    img2.id = `car${++lo}`;
                    a2.appendChild(img2);          
                    p.appendChild(a2);
                    div1.appendChild(p);
                    fragment.appendChild(div1);
                    div.appendChild(fragment);          
                    i++;
                    i1++;}
            //}

            function getData_漫() {
                    // 建立一個 DocumentFragment，可以把它看作一個「虛擬的容器」
                    var div = document.getElementById("comictest");
                    var fragment = document.createDocumentFragment();
                    let div1 = document.createElement("div");
                    div1.className = "blog";
                    let div2 = document.createElement("div");
                    div2.className = "pic";
                    let a = document.createElement("a");
                    a.href = arr_漫[icomic][6];
                    //a.data-fancybox = group1;
                    //a.data-caption = "グループ1キャプション";
                    let img = document.createElement("img");
                    img.src = arr_漫[icomic][6];
                    a.appendChild(img);
                    div2.appendChild(a);
                    div1.appendChild(div2);
                    let p = document.createElement("p");
                    p.textContent = arr_漫[icomic][3];
                    let a2 = document.createElement("a");
                    a2.href = "buyautor_func.php?value=" +arr_漫[icomic][0];
                    let img2 = document.createElement("img");
                    img2.src = "shopping-cart.png";
                    img2.style = "height: 20px; width: 20px; margin-left: 200px; margin-top: 0px;"
                    img2.id = `car${++lo}`;
                    a2.appendChild(img2);
                    p.appendChild(a2);
                    div1.appendChild(p);
                    fragment.appendChild(div1);
                    div.appendChild(fragment);
                    i++;
                    icomic++;}
            //}

            function getData_影() {
                    // 建立一個 DocumentFragment，可以把它看作一個「虛擬的容器」
                    var div = document.getElementById("videotest");
                    var fragment = document.createDocumentFragment();
                    let div1 = document.createElement("div");
                    div1.className = "blog";
                    let div2 = document.createElement("div");
                    div2.className = "pic";
                    /*let a = document.createElement("a");
                    a.href = arr_影[i1][5];*/
                    //a.data-fancybox = group1;
                    //a.data-caption = "グループ1キャプション";
                    let video = document.createElement("video");
                    video.id = "movie";
                    video.controls="autoplay";
                    video.preload="auto";
                    video.id = "movie";
                    video.style="display: block; width: 200px; height: 200px;";
                    //a.appendChild(video);
                    let source = document.createElement("source");
                    source.src = arr_影[ivideo][6];
                    source.type = "video/mp4";
                    video.appendChild(source);
                    div2.appendChild(video);
                    div1.appendChild(div2);
                    let p = document.createElement("p");
                    p.textContent = arr_影[ivideo][3];
                    let a2 = document.createElement("a");
                    a2.href = "buyautor_func.php?value=" +arr_影[ivideo][0];
                    let img2 = document.createElement("img");
                    img2.src = "shopping-cart.png";
                    img2.style = "height: 20px; width: 20px; margin-left: 200px; margin-top: 0px;"
                    img2.id = `car${++lo}`;
                    a2.appendChild(img2);
                    p.appendChild(a2);                          
                    div1.appendChild(p);
                    fragment.appendChild(div1);
                    div.appendChild(fragment);
                    i++;
                    ivideo++;}
            //}

            function getData_文() {
                    // 建立一個 DocumentFragment，可以把它看作一個「虛擬的容器」
                    var div = document.getElementById("articaltest");
                    var fragment = document.createDocumentFragment();
                    let div1 = document.createElement("div");
                    div1.className = "blog";
                    let div2 = document.createElement("div");
                    div2.className = "pic";
                    let a = document.createElement("a");
                    a.href = arr_文[iartical][6];
                    //a.data-fancybox = group1;
                    //a.data-caption = "グループ1キャプション";
                    let img = document.createElement("img");
                    img.src = arr_文[iartical][6];
                    a.appendChild(img);
                    div2.appendChild(a);
                    div1.appendChild(div2);
                    let p = document.createElement("p");
                    p.textContent = arr_文[iartical][3];
                    let a2 = document.createElement("a");
                    a2.href = "buyautor_func.php?value=" +arr_文[iartical][0];
                    let img2 = document.createElement("img");
                    img2.src = "shopping-cart.png";
                    img2.style = "height: 20px; width: 20px; margin-left: 200px; margin-top: 0px;"
                    img2.id = `car${++lo}`;
                    a2.appendChild(img2);
                    p.appendChild(a2);
                    div1.appendChild(p);
                    fragment.appendChild(div1);
                    div.appendChild(fragment);
                    i++;
                    iartical++;}
            //}
      
</script>
