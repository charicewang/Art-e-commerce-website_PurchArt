<?php


session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
//echo "<h1>你好 ".$user_icon."</h1>";
mb_internal_encoding("UTF-8");

?>

<!DOCTYPE html>

<!--主頁面：由簡寧 B094020006 製作-->
<html>
    <head>
        <title>purchArt</title>
        <link href="編輯style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="header.css">

        <!--pop up-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">

        <meta charset="utf-8">
    </head>
    <body>
        <!--font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Raleway:wght@200&display=swap" rel="stylesheet">

        <header id="header">
            <a href="home_logged_in.php"><h1>purchArt</h1></a>
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
                                
                                <li class="menu"><a href="ABOUT US.php">profile</a></li>
                                <li class="menu"><a href="work.php">works</a></li>
                                <li class="menu"><a href="編輯畫面.php">add work</a></li>
                                <li class="menu"><a href="buy.php">goods</a></li>
                                <li class="menu"><a href="#">bookmark</a></li>
                                <br>
                                <li class="menu"><a href="#">setting</a></li>
                                <li class="menu"><a href="nowhome.php">LOG OUT</a></li>
                                <br>
                            </ul>
                        </div>  
                        
                    </li>
                    <li><a href="#purchace"><img  class="icon" src="shopping-cart.png"></a></li>
                    <button>
                        <div class="openbtn9"><div class="openbtn-area"><span></span><span></span><span></span></div></div>
                    </button>
                </ul>
            </nav>
        </header>

        <section>
            <div class="big_tab">
                <div class="tabs">
                    <div style="margin-left: 22%; width: 100%;">
                        <ul class="tabs" class="flex_container">
                            <li><a href="#tab_1" title="illust"><p>illust</p></a></li>
                            <li><a href="#tab_2" title="comics"><p>comics</p></a></li>
                            <li><a href="#tab_3" title="animation"><p>animatioin</p></a></li>
                            <li><a href="#tab_4" title="novel"><p>novel</p></a></li>
                        </ul>
                    </div>
                </div>
               <!--插圖-->
                <div class="tab_container">
                    <div id="tab_1" class="tab_content">
                        <form action="add圖片.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
                            <div class="upload_img">
                                <input type="file" name="myfile[]" accept="image/*" multiple=" multiple" onchange="loadImage1(this);">
                                <div id="imgPreviewField1"></div>
                            </div>

                            <div style="margin-top: 20px;">
                                <div id="t_c" class="flex_container">
                                    <input id="title" type="text" placeholder="title" name="標題">
                                    <hr color="whitesmoke">
                                    <textarea calss="caption" name="coin" placeholder="coin"></textarea>
                                </div>
                                <div class="flex_container box">
                                    <p style="color: red;">年齡限制</p>
                                    <div style="width: 75%; margin: 3%;">
                                        <input type="radio" name="filter" value="N">
                                        <label for="filter">全年齡</label>
                                        <input type="radio" name="filter" value="R">
                                        <label for="filter">r-18</label>
                                        <input type="radio" name="filter" value="G">
                                        <label for="filter">r-18G</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!--內文-->
                            <br>

                            <div>
                                <div id="tags" class="flex_container">
                                    <input id="tag" type="text" placeholder="stock" name="stock">
                                    <hr color="whitesmoke">
                                    <div style="height: 5vh; width: 100%; text-align: left;">
                                        <input type="checkbox" name="filter" value="no">
                                        <label for="position">不接受其他使用者的編輯</label>
                                    </div>
                                    
                                </div>
                             <br>
                                   
                            </div>

                            <div class="box">
                                <input type="checkbox" name="filter" value="no">
                                <label for="position">原創作品</label>
                            </div>
                            
                            <input type="submit" name="upload" value="upload">
                        </form>
                    </div>

                    <!--漫畫-->

                   <div id="tab_2" class="tab_content">
                        <form action="add漫畫.php" method="post"  enctype="multipart/form-data" onSubmit="return InputCheck(this)">

                            <div class="upload_img">
                                <input type="file" name="myfile[]" accept="image/*" multiple=" multiple" onchange="loadImage2(this);">
                               <div id="imgPreviewField2"></div>
                            </div>

                            <div>
                                <div id="t_c" class="flex_container">
                                    <input id="title" type="text" placeholder="title" name="標題">
                                    <hr color="whitesmoke">
                                    <textarea calss="caption" name="coin" placeholder="coin"></textarea>
                                    <hr color="whitesmoke">
                                    <div class="flex_container" id="series">
                                        <p>series</p>
                                        <div style="width: 75%; margin: 0.5% 3%;">
                                            <a href="#new_series" class="modal-open"><button class="S_button">new series</button></a>
                                        </div> 
                                        <section id="new_series">
                                            <!--<form action="" method="POST">-->
                                                <div id="form">
                                                    <div>
                                                        <h1 style="text-align: center;">NEW SERIES</h1><br>
                                                        <hr>
                                                    </div>
                                                    <div class="flex_container">
                                                        <input type="text" name="series_title" placeholder="series title" id="series_title"/>
                                                        <hr color="whitesmoke">
                                                        <textarea calss="series_caption" name="series_caption" placeholder="caption"></textarea>
                                                    </div>
                                                    <div style="text-align: right;">
                                                        <input class="S_button" id="add" type="submit" class="login pull-right" value="Add">
                                                        <div class="clear-fix"></div>
                                                    </div>
                                                </div>    
                                            <!--</form>-->
                                        </section>
                                    </div>
                                </div>

                                <div class="flex_container box">
                                    <p style="color: red;">年齡限制</p>
                                    <div style="width: 75%; margin: 3%;">
                                        <input type="radio" name="filter" value="N">
                                        <label for="filter">全年齡</label>
                                        <input type="radio" name="filter" value="R">
                                        <label for="filter">r-18</label>
                                        <input type="radio" name="filter" value="G">
                                        <label for="filter">r-18G</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <br>
                            <div>
                                <div id="tags" class="flex_container">
                                    <input id="tag" type="text" placeholder="stock" name="stock">
                                    <hr color="whitesmoke">
                                    <div style="height: 5vh; width: 100%; text-align: left;">
                                        <input type="checkbox" name="filter" value="no">
                                        <label for="position">不接受其他使用者的編輯</label>
                                    </div>   
                                </div>
                                <br>         
                            </div>

                            <div class="box">
                                <input type="checkbox" name="filter" value="no">
                                <label for="position">原創作品</label>
                            </div>
                            <input type="submit" name="upload" value="upload">
                        </form>
                    </div>

                <!--動畫-->
                    <div id="tab_3" class="tab_content">
                        <form action="add動畫.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
                            <div class="big_tab">
                                <div class="tab_container">
                                    <!--<div id="GIF" class="tab_content">
                                        <div class="upload_img">
                                            選擇GIF檔
                                            <input type="file" name="myfile[]" accept="img/gif" onchange="previewImage(this);"> 
                                            <input type="checkbox" name="loop" value="loop">
                                            <label for="loop">Loop</label>
                                            <div id="imgPreviewField">
                                                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
                                            </div>
                                        </div>
                                    </div>-->

                                    <div id="ANIME" class="tab_content">
                                        <div class="upload_img">
                                            選擇影片檔
                                            <input type="file" name="myfile[]" accept="video/*"> 
                                            <input type="checkbox" name="loop" value="loop">
                                            <label for="loop">Loop</label>
                                            <div id="imgPreviewField">
                                                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                                <ul class="tabs flex_container small_tabs" style="padding: 0%;">
                                    <!--<li><a href="#GIF" title="gif"><p>GIF</p></a></li>-->
                                    <li><a href="#ANIME" title="animation"><p>Animation</p></a></li>
                                </ul>
                            </div>

                            <div id="t_c" class="flex_container">
                                <input id="title" type="text" placeholder="title" name="標題">
                                <hr color="whitesmoke">
                                <textarea calss="caption" name="coin" placeholder="coin"></textarea>
                            </div>

                            <div class="flex_container box">
                                <p style="color: red;">年齡限制</p>
                                <div style="width: 75%; margin: 3%;">
                                    <input type="radio" name="filter" value="N">
                                    <label for="filter">全年齡</label>
                                    <input type="radio" name="filter" value="R">
                                    <label for="filter">r-18</label>
                                    <input type="radio" name="filter" value="G">
                                    <label for="filter">r-18G</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div id="tags" class="flex_container">
                                    <input id="tag" type="text" placeholder="stock" name="stock">
                                    <hr color="whitesmoke">
                                    <div style="height: 5vh; width: 100%; text-align: left;">
                                        <input type="checkbox" name="filter" value="no">
                                        <label for="position">不接受其他使用者的編輯</label>
                                    </div>   
                                </div>
                                <br>         
                            </div>
                    
                            <div class="box">
                                <input type="checkbox" name="filter" value="no">
                                <label for="position">原創作品</label>
                            </div>
                            <input type="submit" name="upload" value="upload">
                        </form>
                    </div> 

                    <!--小說-->
                <div id="tab_4" class="tab_content novel">
                    <form action="add小說.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
                        <div class="upload_img novel">
                            封面
                            <input type="file" name="myfile" accept="image/*" onchange="previewImage(this);">
                            <div id="imgPreviewField">
                                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
                            </div>
                        </div>

                        <div class="flex_container">
                            <div style="margin-top: 20px; width: 45%;" >
                                <input id="n_title" type="text" placeholder="title" name="小說標題">
                            </div>

                            <div id="series" style="width: 200px;">
                                <div style="margin: 13% 1%; text-align: right;">
                                    <a href="#new_series" class="modal-open"><button class="S_button">new series</button></a>
                                </div> 
                                <section id="new_series">
                                    <!--<form action="" method="POST">-->
                                        <div id="form">
                                            <div>
                                                <h1 style="text-align: center;">NEW SERIES</h1><br>
                                                <hr>
                                            </div>
                                            <div class="flex_container">
                                                <input type="text" name="series_title" placeholder="series title" id="series_title"/>
                                                <hr color="whitesmoke">
                                                <textarea calss="series_caption" name="series_caption" placeholder="caption"></textarea>
                                            </div>
                                            <div style="text-align: right;">
                                                <input class="S_button" id="add" type="submit" class="login pull-right" value="Add">
                                                  <div class="clear-fix"></div>
                                            </div>
                                        </div>    
                                    <!--</form>-->
                                </section>
                            </div>
                        </div>

                        <div class="box2">
                            <textarea id="artical" name="artical" placeholder="內文"></textarea>
                            <hr color="white">
                            <textarea calss="caption" name="coin" placeholder="coin"></textarea>
                        </div>
                        <br>
                        <hr color="whitesmoke" style="margin:0% 5%;">
                        <br>

                        <div>
                            <br>  
                            <div id="tags2" class="flex_container">
                                <input id="tag2" type="text" placeholder="stock" name="stock">
                                <hr color="whitesmoke">
                                <div style="height: 5vh; width: 100%; text-align: left;">
                                    <input type="checkbox" name="filter" value="no">
                                    <label for="position">不接受其他使用者的編輯</label>
                                </div>
                            </div>
                        </div>

                        <!--<div class="box2">
                            <textarea calss="caption" name="n_caption" placeholder="caption"></textarea>
                        </div>-->
                        
                        <div class="flex_container box">
                            <input type="checkbox" name="original" value="yes" style="margin-top: 2%;">
                            <label for="original" style="padding-top: 1.5%;">原創作品</label>

                            <div class="flex_container box" style="margin-top: 0%; margin-left: 20%;">
                                <p style="color: red; width: 25%;" >年齡限制</p>
                                <div style="width: 65%; margin:3% 0%;">
                                    <input type="radio" name="filter" value="N">
                                    <label for="filter">全年齡</label>
                                    <input type="radio" name="filter" value="R">
                                    <label for="filter">r-18</label>
                                    <input type="radio" name="filter" value="G">
                                    <label for="filter">r-18G</label>
                                </div>
                            </div>
                        </div>
                            
                            <br>
                        <!--內文-->
                        <br>
                        
                        <input type="submit" name="upload" value="upload">
                    </form>
                </div>
            </div>
        </section>

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

        <!--pop up-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
        <script src="編輯java.js"></script>
    </body>
</html>