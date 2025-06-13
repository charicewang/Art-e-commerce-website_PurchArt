<?php


session_start();  //很重要，可以用的變數存在session裡
$user_id = $_SESSION["id"];
$user_icon = $_SESSION["icon"];
$user_name = $_SESSION["name"];
//echo "<h1>你好 ".$user_icon."</h1>";
mb_internal_encoding("UTF-8");
//連結資料庫
$link = new PDO("mysql:dbname=purchart;host=localhost","root","");
//購物車中有哪些商品
$result = $link->query("select * from 購物車,商品 where 商品.商品編號=購物車.商品編號 AND 購物車.會員ID = $user_id;");

$ca = 0;
while($row=$result->fetch()){
   $j = 0;

   $arr_購[$ca][$j] = $row['會員ID'];
   ++$j;

   $arr_購[$ca][$j] = $row['產生時間'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品編號'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品數量'];
   ++$j;

   $arr_購[$ca][$j] = $row['價格'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品圖片'];
   ++$j;

   $arr_購[$ca][$j] = $row['商品名稱'];
   
   
   ++$ca;
   $i購 = $ca;
   $icou = $ca;
   $cou = 0;
   }
//echo $arr_購[1][5];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>購物車</title>
    <!--<script src="https://unpkg.com/vue/dist/vue.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="carstyle.css">
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
        <h1><a href="Home_logged_in.php">purchArt</h1>
        <!--<div id="search">
            <img src="magnifying-glass.png">
            <input type="search" placeholder="Search">
        </div>-->
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
                            <li class="menu"><a href="上架畫面.php">add good</a></li>
                            <li class="menu"><a href="#">bookmark</a></li>
                            <br>
                            <li class="menu"><a href="#">setting</a></li>
                            <li class="menu"><a href="nowhome.php">LOG OUT</a></li>
                            <br>
                        </ul>
                    </div>  
                    
                </li>

                <li><a href="car.php"><img  class="icon" src="shopping-cart.png"></a></li> <!--class="in"-->
                <button>
                    <div class="openbtn9"><div class="openbtn-area"><span></span><span></span><span></span></div></div>
                </button>
            </ul>
        </nav>
    </header>

    <div id="app">
        <div class="container">
            <div class="item_header">
                <div class="item_detail">商品</div>
                <div class="count">數量</div> 
                <div class="price">單價</div>                
                <div class="amount">總計</div>
            </div>
            <div class="item_container" v-for="(item, index) in itemList" :key="item.id" >
                    <div class="item_header item_body">
                            <div class="item_detail">
                                <img v-bind:src="item.imgUrl" alt="">
                                <div class="name">{{item.itemName}}</div>
                            </div>
                            <div class="count">
                                <button @click="handleSub(item)">-</button>
                                {{item.count}}
                                <button @click="handlePlus(item)">+</button>
                            </div> 
                            <div class="price"><span>$</span>{{item.price}}</div>
                            
                            <div class="amount">{{item.price * item.count}}</div>
                    </div>
            </div>
            <a href="paid.php"><h1 style="position:relative;left:1200px;top: 200px;color:black">PAY NOW -></h1></a>


        </div>
    </div>
</body>
</html>

<script>
    var i = 0;
    var app = new Vue({
    el:'#app',
    data:{
        itemList:[
          {
            id:'<?php echo $arr_購[--$icou][2]?>',
            itemName:'<?php echo $arr_購[$icou][6]?>',
            imgUrl:'<?php echo $arr_購[$icou][5]?>',
            price:'<?php echo $arr_購[$icou][4]?>',
            count:'1'
          },
          
    ]
    },
    methods:{
        handlePlus: function(item){
            item.count++;
        },
        handleSub: function(item){
            if(item.count>1){
            item.count--;                
            }
        },
        handledelete: function(index){
            console.log(this);
            this.itemList.splice(index,1);
        }
    },
    computed:{

    }
})
</script>