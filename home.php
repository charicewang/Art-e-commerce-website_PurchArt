<?php
$host = 'localhost';
$dbuser ='root';
$dbpassword = '';
$dbname = 'purchart';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    mysqli_query($link,'SET NAMES uff8');
     echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
//$sql = "SELECT * FROM `會員資料` WHERE `會員ID` = :1";
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
<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Raleway:wght@200&display=swap" rel="stylesheet">

    <header id="header">
        <h1>purchArt</h1>
        <div id="search">
            <img src="img/home/magnifying-glass.png">
            <input type="search" placeholder="Search">
        </div>
        <nav>
            <ul>
            <li><a href="#message">Bell icon</a></li>
            <li><a href="#profile">user_icon</a></li>
            <li><a href="#purchace">shoping_car</a></li>
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
            <h1 class="section">video</h1>
                <ul class="slider">
                    <li><video src="ANIM_0006.mov" alt=""></li>
                    <li><video src="ANIM_0006.mov" alt=""></li>
                    <li><video src="ANIM_0006.mov" alt=""></li>
                    <li><video src="ANIM_0006.mov" alt=""></li>
                    <li><video src="ANIM_0006.mov" alt=""></li>
                    <li><video src="ANIM_0006.mov" alt=""></li>
                    <!--/slider--></ul>


            <h1 class="section">ranking</h1>
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

                    <div class="item-content">
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                        

                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>

                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>

                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                    
                    <!--複数画像をグループ化してサムネ
                    イル表示させたい場合は、datafancybox="半角英数字で同一のグループ名"、キャプションを入れたい場合はdata-caption="キャプションタイトル"を設定する。-->
                    </div>

                    </li>
                    <li class="item sort02">
                    <div class="item-content">
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                    </div>
                    </li>
                    <li class="item sort03">
                    <div class="item-content">
                        <div class="blog">
                            <div class= "pic">
                                <a href="nice boi.jpg" data-fancybox="group1" data-caption="グループ1キャプション">
                                    <img src="nice boi.jpg" alt="">
                                </a>
                            </div>
                            <p>title</p>
                            <div>
                                icon&name
                            </div>
                        </div>
                    </div>
                    </li>
                    </ul>
                    
            </div>

            <h1 class="section">follow_user</h1>
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
            </ul>

        </section>

        <!--地圖：點擊台灣會跳到貼文串的最上方，點擊其他地區則會到貼文串相應的地區-->
        <section id="map">
            <h2>Wanna buy some stuff?</h2>
            <div id="search">
                <img src="img/home/magnifying-glass.png">
                <input type="search" placeholder="Surch your favorite artist">
            </div>

            <div class= "flex_container">
                <div class= "place">
                    <a href= "middle page.html">
                        <div>
                            <img src= "img/map/taiwan.png">
                        </div>
                        <p>Taiwan</p>
                    </a>        
                </div>

                <div class= "place">
                    <a href= "middle page.html #north">
                        <div>
                            <img src= "img/map/n-taiwan.png">
                        </div>
                        <p>North</p> 
                    </a>        
                </div>

                <div class= "place">
                    <a href= "middle page.html #middle">
                        <div>
                            <img src= "img/map/m-taiwan.png">
                        </div>
                        <p>middle</p>
                    </a>
                </div>

                <div class= "place">
                    <a href= "middle page.html #south">
                        <div>
                            <img src= "img/map/s-taiwan.png">
                        </div>  
                        <p>South</p>
                    </a>
                </div>

                <div class= "place">
                    <a href= "middle page.html #east">
                        <div>
                            <img src= "img/map/e-taiwan.png">
                        </div>
                        <p>East</p>
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
            <img src= "img/upload.png">
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

    <script src="home.js"></script>
</body>
</html>