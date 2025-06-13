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
        <link href="個人編輯style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="header.css">

        <!--pop up-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
        <link href="header.css" rel="stylesheet">

        <meta charset="utf-8">
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
                    <li class="has-child"><img  class="icon" src="user.png"> <!--class="in"-->
                        <div>
                            <ul>
                                <div class = "pro_icon">
                                    <img src="<?php echo $user_icon; ?>">
                                    <div class="info">
                                        <p><?php echo $user_name; ?></p>
                                        <p><small><?php echo $user_id; ?></small></p>
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
                    <li><a href="car.php"><img  class="icon" src="shopping-cart.png"></a></li>
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
                            <li><a href="#tab_1" title="基本資料"><p>基本資料</p></a></li>
                            <li><a href="#tab_2" title="進階"><p>進階</p></a></li>
                        </ul>
                    </div>
                </div>


               <!--基本-->
                <div class="tab_container">
                    <form action="upload1.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
                        <div id="tab_1" class="tab_content">                       
                            <div class="upload_img">
                                <input type="file" name="頭像" accept="image/*" placeholder="頭像圖片" onchange="loadImage(this);">
                                <!--<input type="file" name="首頁" accept="image/*" placeholder="首頁圖片" onchange="loadImage2(this);">-->
                                <div class="flex_container">
                                    <div  class="profile">
                                        <div id="imgPreviewField" class="member"></div>
                                    </div>
                                    <div id="imgPreviewField2" style="margin-left: 10vh;"></div>
                                </div>
                                
                            </div>

                            <div style="margin-top: 20px;">
                                <div id="t_c" class="flex_container">
                                    <input id="title" type="text" placeholder="暱稱" name="暱稱">
                                    <hr color="whitesmoke">
                                    <textarea calss="caption" name="說明" placeholder="自我介紹"></textarea>
                                </div>
                                <br>
                                <div id="t_c" class="flex_container">
                                    <input type="text" placeholder="purchArt ID" name="ID" style="margin: 2%;">
                                    <hr color="whitesmoke">
                                    <div class="flex_container" style="width: 100%">
                                        <p>電子信箱</p>
                                        <div style="width: 75%; margin: 3%;">
                                            <input class="mail" type="email" placeholder="信箱" name="信箱">
                                        </div>
                                        <a href="#" id="change_password" style="margin: 1%; color: skyblue;">變更密碼</a>
                                    </div>
                                </div>                               

                                <div class="flex_container box">
                                    <p>生日</p>
                                    <div style="width: 75%; margin: 3%">
                                        <input type="date" name="生日">
                                    </div>
                                </div>

                                <div class="flex_container box">
                                    <p>性別</p>
                                    <div style="width: 75%; margin: 3%;">
                                        <input type="radio" name="gender" value="M">
                                        <label for="gender">男</label>
                                        <input type="radio" name="gender" value="F">
                                        <label for="gender">女</label>
                                        <input type="radio" name="gender" value="Other">
                                        <label for="gender">其他</label>
                                    </div>
                                </div>

                                <div class="flex_container box">
                                    <p style="margin: auto;">地區</p>
                                    <div style="width: 75%; margin: 3%;">
                                        <select name="country">
                                            <option value="" ></option>
                                            <option value='CN'>China 中國<option value='AF'>Afghanistan 阿富汗<option value='AL'>Albania 阿爾巴尼亞
                                                <option value='AD'>Andorra 安道爾<option value='AO'>Angola 安哥拉<option value='AI'>Anguilla 安圭拉
                                                <option value='AQ'>Antarctica 南極洲<option value='AG'>ANtigua and Barbuda 安地卡及巴布達<option value='AR'>Argentina 阿根廷
                                                <option value='AM'>Armenia 亞美尼亞<option value='AW'>Aruba 阿魯巴<option value='AU'>Australia 澳大利亞
                                                <option value='AT'>Austria 奧地利<option value='AZ'>Azerbaijan 亞塞拜然<option value='AE'>United Arab Emirates 阿拉伯聯合大公國
                                                <option value='BS'>Bahamas 巴哈馬<option value='BH'>Bahrain 巴林<option value='BD'>Bangladesh 孟加拉
                                                <option value='BB'>Barbados 巴貝多<option value='BY'>Belarus 白俄羅斯<option value='BZ'>Belize 貝里斯
                                                <option value='BE'>Belgium 比利時<option value='BJ'>Benin 貝南<option value='BM'>Bermuda 百慕大
                                                <option value='BT'>Bhutan 不丹<option value='BO'>Bolivia 玻利維亞<option value='BA'>Bosnia Hercegovina 波黑
                                                <option value='BW'>Botswana 波札那<option value='BV'>Bouvet Island 布維島<option value='BR'>Brazil 巴西
                                                <option value='BN'>Brunei Darussalam 汶萊<option value='BG'>Bulgaria 保加利亞<option value='BF'>Burkina Faso 布其納法索
                                                <option value='BI'>Burundi 蒲隆地<option value='CM'>Cameroon 喀麥隆<option value='CA'>Canada 加拿大
                                                <option value='CV'>Cape Verde,Republic of 維德角<option value='CF'>The Central African Republic 中非共和國
                                                <option value='CL'>Chile 智利<option value='CN'>China 中國<option value='CX'>Christmas Island 聖誕島
                                                <option value='CC'>COCOS Islands 可可島<option value='CO'>Colombia 哥倫比亞<option value='CH'>tzerland 瑞士
                                                <option value='CG'>Congo 剛果<option value='CK'>Cook Island 庫克群島<option value='CR'>Costa rica 哥斯大黎加 
                                                <option value='CI'>Lvory Coast 象牙海岸<option value='CU'>Cuba 古巴<option value='CY'>Cyprus 塞普勒斯
                                                <option value='CZ'>Czech Republic 捷克共和國<option value='DK'>Denmark 丹麥<option value='DJ'>Djibouti 吉布提
                                                <option value='DM'>Gominica 多明哥<option value='DE'>Grmany 德國<option value='DO'>Dominica 多明尼加
                                                <option value='DZ'>Algeria 阿爾及利亞<option value='EC'>Ecuador 厄瓜多<option value='EG'>Egypt 埃及
                                                <option value='EH'>West Sahara 西撒哈拉<option value='ES'>Spain 西班牙<option value='EE'>Estonia 愛沙尼亞
                                                <option value='ET'>Ethiopia 衣索比亞<option value='FJ'>Fiji 斐濟<option value='FK'>Falkland Islands 福克蘭群島
                                                <option value='FI'>Finland 芬蘭<option value='FR'>France 法國<option value='FM'>Micronesia 密克羅尼西亞
                                                <option value='GA'>Gabon 加彭<option value='GQ'>Equatorial Guinea 赤道幾內亞<option value='GF'>French Guiana 法屬蓋亞那
                                                <option value='GM'>Gambia 甘比亞<option value='GE'>Georgia 喬治亞<option value='GH'>Ghana 迦納<option value='GI'>Gibraltar 直布羅陀
                                                <option value='GR'>Greece 希臘<option value='GL'>Greenland 格陵蘭<option value='GB'>United Kingdom 英國
                                                <option value='GD'>Grenada 格瑞那達<option value='GP'>Guadeloupe 瓜德羅普<option value='GU'>Guam 關島
                                                <option value='GT'>Guatemala 瓜地馬拉<option value='GN'>Guinea 幾內亞<option value='GW'>Guinea-Bissau 幾內亞比索
                                                <option value='GY'>Guyana 蓋亞那<option value='HR'>Croatia 克羅埃西亞<option value='HT'>Haiti 海地<option value='HN'>Honduras 宏都拉斯
                                                <option value='HK'>Hong Kong 中國香港<option value='HU'>Hungary 匈牙利<option value='IS'>Iceland 冰島
                                                <option value='IN'>India 印度<option value='ID'>Indonesia 印度尼西亞<option value='IR'>Iran 伊朗<option value='IQ'>Iraq 伊拉克
                                                <option value='IO'>British Indian Ocean Territory 英聯邦的印度洋領域<option value='IE'>Ireland 愛爾蘭<option value='IL'>Israel 以色列
                                                <option value='IT'>Italy 義大利<option value='JM'>Jamaica 牙買加<option value='JP'>Japan 日本<option value='JO'>Jordan 約旦
                                                <option value='KZ'>Kazakstan 哈薩克<option value='KE'>Kenya 肯亞<option value='KI'>Kiribati 吉里巴斯
                                                <option value='KP'>North Korea 朝鮮<option value='KR'>Korea 韓國<option value='KH'>Cambodia 柬埔寨<option value='KM'>Comoros 葛摩
                                                <option value='KW'>kuwait 科威特<option value='KG'>Kyrgyzstan 吉爾吉斯斯坦<option value='KY'>Cayman Islands 開曼群島
                                                <option value='LA'>Laos 寮國<option value='LK'>Sri Lanka 斯里蘭卡<option value='LV'>Latvia 拉托維亞
                                                <option value='LB'>Lebanon 黎巴嫩<option value='LS'>Lesotho 賴索托<option value='LR'>Liberia 賴比瑞亞
                                                <option value='LY'>Libya 利比亞<option value='LI'>Liechtenstein 列支敦斯登<option value='LT'>Lithuania 立陶宛
                                                <option value='LU'>Luxembourg 盧森堡<option value='LC'>St. Lucia 聖露西亞<option value='MO'>Macao 中國澳門
                                                <option value='MG'>Malagasy 馬達加斯加<option value='MW'>Malawi 馬拉維<option value='MY'>Malaysia 馬來西亞
                                                <option value='MV'>Maldives 馬爾地夫<option value='ML'>Mali 馬裡<option value='MT'>Malta 馬耳他<option value='MH'>Marshall Islands 馬紹爾群島
                                                <option value='MR'>Mauritania 茅利塔尼亞<option value='MU'>Mauritius 模里西斯<option value='MX'>Mexico 墨西哥
                                                <option value='MD'>Moldova 摩爾多瓦<option value='MC'>Monaco 摩納哥<option value='MN'>Mongolia 蒙古<option value='MS'>Montserrat 蒙特塞拉特
                                                <option value='MA'>Morocco 摩洛哥<option value='MZ'>Mozambique 莫三比克<option value='MM'>Burma 緬甸<option value='MP'>Northern Mariana Islands 北馬里亞那群島
                                                <option value='NA'>Namibia 納米比亞<option value='NR'>Naura 諾魯<option value='NP'>Nepal 尼泊爾<option value='NL'>Netherlands 荷蘭
                                                <option value='NT'>Neutral Zone 中立區<option value='NC'>New Caledonia 新喀里多尼亞<option value='NZ'>New Zealand 紐西蘭<option value='NI'>Nicaragua 尼加拉瓜
                                                <option value='NE'>Niger 尼日<option value='NG'>Nigeria 奈及利亞<option value='NU'>Niue 紐埃<option value='NF'>Norfolk Island 諾福克島
                                                <option value='NO'>Norway 挪威<option value='OM'>Oman 阿曼<option value='PK'>Pakistan 巴基斯坦<option value='PF'>French Polynesia 法屬玻里尼西亞
                                                <option value='PW'>Palau 帛琉<option value='PA'>Panama 巴拿馬<option value='PG'>Papua,Territory of 巴布亞紐幾內亞<option value='PY'>Paraguay 巴拉圭
                                                <option value='PE'>Peru 祕魯<option value='PH'>Philippines 菲律賓<option value='PN'>Pitcairn Islands 皮特開恩群島<option value='PL'>Poland 波蘭
                                                <option value='PT'>Portugal 葡萄牙<option value='PR'>Puerto Rico 波多黎各(美)<option value='QA'>Qatar 卡達<option value='RO'>Romania 羅馬尼亞
                                                <option value='RU'>Russia 俄羅斯聯邦<option value='RW'>Rwanda 盧安達<option value='SV'>El Salvador 薩爾瓦多<option value='SH'>St.Helena 聖赫勒那
                                                <option value='SM'>San Marino 聖馬利諾<option value='ST'>Sao Tome and Principe 聖多美與普林西比<option value='SA'>Saudi Arabia 沙烏地阿拉伯<option value='SN'>Senegal 塞內加爾
                                                <option value='SC'>Seychelles 塞席爾<option value='SL'>Sierra leone 獅子山<option value='SG'>Singapore 新加坡<option value='SK'>Slovakia 斯洛伐克<option value='SI'>Slovene 斯洛維尼亞
                                                <option value='SB'>Solomon Islands 索羅門群島<option value='SO'>Somali 索馬利亞<option value='SD'>Sudan 蘇丹<option value='SR'>Surinam 蘇利南<option value='SZ'>Swaziland 史瓦濟蘭
                                                <option value="other">Other 其他</option>
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex_container box">
                                    <p style="margin: auto;">職業</p>
                                    <div style="width: 75%; margin: 3%;">
                                        <select name="job">
                                            <option value=""></option>
                                            <option value="IT">IT相關</option>
                                            <option value="上班族">上班族</option>
                                            <option value="技術相關">技術相關</option>
                                            <option value="服務業">服務業</option>
                                            <option value="公務員">公務員</option>
                                            <option value="教職">教職</option>
                                            <option value="自營業">自營業</option>
                                            <option value="創作家/藝術家">創作家/藝術家</option>
                                            <option value="音樂相關">音樂相關</option>
                                            <option value="打工族">打工族</option>
                                            <option value="小學生">小學生</option>
                                            <option value="中學生">中學生</option>
                                            <option value="高中/高職生">高中/高職生</option>
                                            <option value="大學/五專院生">大學/五專院生</option>
                                            <option value="研究生">研究生</option>
                                            <option value="博士生">博士生</option>
                                            <option value="主婦/主夫">家庭主婦/主夫</option>
                                            <option value="求職中">求職中</option>
                                            <option value="其他">其他</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--內文-->
                            <br>
                            
                            
                    </div>

                    <!--進階-->
                    <div id="tab_2" class="tab_content">
                            <div id="info">
                                <div class="flex_container box">
                                    <p>身分證字號</p>
                                    <div style="width: 75%; margin: 2%;">
                                        <input type="text" name="pID">
                                    </div>
                                </div>
                                <div class="flex_container box">
                                    <p>住所</p>
                                        <select name="country" style="width:15%; height: 50px; margin-top: 1%;">
                                            <option value="" ></option>
                                            <option value='CN'>China 中國<option value='AF'>Afghanistan 阿富汗<option value='AL'>Albania 阿爾巴尼亞
                                                <option value='AD'>Andorra 安道爾<option value='AO'>Angola 安哥拉<option value='AI'>Anguilla 安圭拉
                                                <option value='AQ'>Antarctica 南極洲<option value='AG'>ANtigua and Barbuda 安地卡及巴布達<option value='AR'>Argentina 阿根廷
                                                <option value='AM'>Armenia 亞美尼亞<option value='AW'>Aruba 阿魯巴<option value='AU'>Australia 澳大利亞
                                                <option value='AT'>Austria 奧地利<option value='AZ'>Azerbaijan 亞塞拜然<option value='AE'>United Arab Emirates 阿拉伯聯合大公國
                                                <option value='BS'>Bahamas 巴哈馬<option value='BH'>Bahrain 巴林<option value='BD'>Bangladesh 孟加拉
                                                <option value='BB'>Barbados 巴貝多<option value='BY'>Belarus 白俄羅斯<option value='BZ'>Belize 貝里斯
                                                <option value='BE'>Belgium 比利時<option value='BJ'>Benin 貝南<option value='BM'>Bermuda 百慕大
                                                <option value='BT'>Bhutan 不丹<option value='BO'>Bolivia 玻利維亞<option value='BA'>Bosnia Hercegovina 波黑
                                                <option value='BW'>Botswana 波札那<option value='BV'>Bouvet Island 布維島<option value='BR'>Brazil 巴西
                                                <option value='BN'>Brunei Darussalam 汶萊<option value='BG'>Bulgaria 保加利亞<option value='BF'>Burkina Faso 布其納法索
                                                <option value='BI'>Burundi 蒲隆地<option value='CM'>Cameroon 喀麥隆<option value='CA'>Canada 加拿大
                                                <option value='CV'>Cape Verde,Republic of 維德角<option value='CF'>The Central African Republic 中非共和國
                                                <option value='CL'>Chile 智利<option value='CN'>China 中國<option value='CX'>Christmas Island 聖誕島
                                                <option value='CC'>COCOS Islands 可可島<option value='CO'>Colombia 哥倫比亞<option value='CH'>tzerland 瑞士
                                                <option value='CG'>Congo 剛果<option value='CK'>Cook Island 庫克群島<option value='CR'>Costa rica 哥斯大黎加 
                                                <option value='CI'>Lvory Coast 象牙海岸<option value='CU'>Cuba 古巴<option value='CY'>Cyprus 塞普勒斯
                                                <option value='CZ'>Czech Republic 捷克共和國<option value='DK'>Denmark 丹麥<option value='DJ'>Djibouti 吉布提
                                                <option value='DM'>Gominica 多明哥<option value='DE'>Grmany 德國<option value='DO'>Dominica 多明尼加
                                                <option value='DZ'>Algeria 阿爾及利亞<option value='EC'>Ecuador 厄瓜多<option value='EG'>Egypt 埃及
                                                <option value='EH'>West Sahara 西撒哈拉<option value='ES'>Spain 西班牙<option value='EE'>Estonia 愛沙尼亞
                                                <option value='ET'>Ethiopia 衣索比亞<option value='FJ'>Fiji 斐濟<option value='FK'>Falkland Islands 福克蘭群島
                                                <option value='FI'>Finland 芬蘭<option value='FR'>France 法國<option value='FM'>Micronesia 密克羅尼西亞
                                                <option value='GA'>Gabon 加彭<option value='GQ'>Equatorial Guinea 赤道幾內亞<option value='GF'>French Guiana 法屬蓋亞那
                                                <option value='GM'>Gambia 甘比亞<option value='GE'>Georgia 喬治亞<option value='GH'>Ghana 迦納<option value='GI'>Gibraltar 直布羅陀
                                                <option value='GR'>Greece 希臘<option value='GL'>Greenland 格陵蘭<option value='GB'>United Kingdom 英國
                                                <option value='GD'>Grenada 格瑞那達<option value='GP'>Guadeloupe 瓜德羅普<option value='GU'>Guam 關島
                                                <option value='GT'>Guatemala 瓜地馬拉<option value='GN'>Guinea 幾內亞<option value='GW'>Guinea-Bissau 幾內亞比索
                                                <option value='GY'>Guyana 蓋亞那<option value='HR'>Croatia 克羅埃西亞<option value='HT'>Haiti 海地<option value='HN'>Honduras 宏都拉斯
                                                <option value='HK'>Hong Kong 中國香港<option value='HU'>Hungary 匈牙利<option value='IS'>Iceland 冰島
                                                <option value='IN'>India 印度<option value='ID'>Indonesia 印度尼西亞<option value='IR'>Iran 伊朗<option value='IQ'>Iraq 伊拉克
                                                <option value='IO'>British Indian Ocean Territory 英聯邦的印度洋領域<option value='IE'>Ireland 愛爾蘭<option value='IL'>Israel 以色列
                                                <option value='IT'>Italy 義大利<option value='JM'>Jamaica 牙買加<option value='JP'>Japan 日本<option value='JO'>Jordan 約旦
                                                <option value='KZ'>Kazakstan 哈薩克<option value='KE'>Kenya 肯亞<option value='KI'>Kiribati 吉里巴斯
                                                <option value='KP'>North Korea 朝鮮<option value='KR'>Korea 韓國<option value='KH'>Cambodia 柬埔寨<option value='KM'>Comoros 葛摩
                                                <option value='KW'>kuwait 科威特<option value='KG'>Kyrgyzstan 吉爾吉斯斯坦<option value='KY'>Cayman Islands 開曼群島
                                                <option value='LA'>Laos 寮國<option value='LK'>Sri Lanka 斯里蘭卡<option value='LV'>Latvia 拉托維亞
                                                <option value='LB'>Lebanon 黎巴嫩<option value='LS'>Lesotho 賴索托<option value='LR'>Liberia 賴比瑞亞
                                                <option value='LY'>Libya 利比亞<option value='LI'>Liechtenstein 列支敦斯登<option value='LT'>Lithuania 立陶宛
                                                <option value='LU'>Luxembourg 盧森堡<option value='LC'>St. Lucia 聖露西亞<option value='MO'>Macao 中國澳門
                                                <option value='MG'>Malagasy 馬達加斯加<option value='MW'>Malawi 馬拉維<option value='MY'>Malaysia 馬來西亞
                                                <option value='MV'>Maldives 馬爾地夫<option value='ML'>Mali 馬裡<option value='MT'>Malta 馬耳他<option value='MH'>Marshall Islands 馬紹爾群島
                                                <option value='MR'>Mauritania 茅利塔尼亞<option value='MU'>Mauritius 模里西斯<option value='MX'>Mexico 墨西哥
                                                <option value='MD'>Moldova 摩爾多瓦<option value='MC'>Monaco 摩納哥<option value='MN'>Mongolia 蒙古<option value='MS'>Montserrat 蒙特塞拉特
                                                <option value='MA'>Morocco 摩洛哥<option value='MZ'>Mozambique 莫三比克<option value='MM'>Burma 緬甸<option value='MP'>Northern Mariana Islands 北馬里亞那群島
                                                <option value='NA'>Namibia 納米比亞<option value='NR'>Naura 諾魯<option value='NP'>Nepal 尼泊爾<option value='NL'>Netherlands 荷蘭
                                                <option value='NT'>Neutral Zone 中立區<option value='NC'>New Caledonia 新喀里多尼亞<option value='NZ'>New Zealand 紐西蘭<option value='NI'>Nicaragua 尼加拉瓜
                                                <option value='NE'>Niger 尼日<option value='NG'>Nigeria 奈及利亞<option value='NU'>Niue 紐埃<option value='NF'>Norfolk Island 諾福克島
                                                <option value='NO'>Norway 挪威<option value='OM'>Oman 阿曼<option value='PK'>Pakistan 巴基斯坦<option value='PF'>French Polynesia 法屬玻里尼西亞
                                                <option value='PW'>Palau 帛琉<option value='PA'>Panama 巴拿馬<option value='PG'>Papua,Territory of 巴布亞紐幾內亞<option value='PY'>Paraguay 巴拉圭
                                                <option value='PE'>Peru 祕魯<option value='PH'>Philippines 菲律賓<option value='PN'>Pitcairn Islands 皮特開恩群島<option value='PL'>Poland 波蘭
                                                <option value='PT'>Portugal 葡萄牙<option value='PR'>Puerto Rico 波多黎各(美)<option value='QA'>Qatar 卡達<option value='RO'>Romania 羅馬尼亞
                                                <option value='RU'>Russia 俄羅斯聯邦<option value='RW'>Rwanda 盧安達<option value='SV'>El Salvador 薩爾瓦多<option value='SH'>St.Helena 聖赫勒那
                                                <option value='SM'>San Marino 聖馬利諾<option value='ST'>Sao Tome and Principe 聖多美與普林西比<option value='SA'>Saudi Arabia 沙烏地阿拉伯<option value='SN'>Senegal 塞內加爾
                                                <option value='SC'>Seychelles 塞席爾<option value='SL'>Sierra leone 獅子山<option value='SG'>Singapore 新加坡<option value='SK'>Slovakia 斯洛伐克<option value='SI'>Slovene 斯洛維尼亞
                                                <option value='SB'>Solomon Islands 索羅門群島<option value='SO'>Somali 索馬利亞<option value='SD'>Sudan 蘇丹<option value='SR'>Surinam 蘇利南<option value='SZ'>Swaziland 史瓦濟蘭
                                                <option value="other">Other 其他</option>
                                            </option>
                                        </select>
                                    <div style="width: 60%; margin: 2%;">
                                        <input type="text" name="住所">
                                    </div>
                                </div>
                                <div class="flex_container box">
                                    <p>電話號碼</p>
                                    <div style="width: 75%; margin: 2%;">
                                        <input type="text" name="phone_number">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <br>
                           <input type="submit" name="upload" value="upload"> 
                    </div>
                    

                </form>
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

        <script src="js.js"></script>
    </body>
</html>