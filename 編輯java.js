/*window.onload = function() {
    document.getElementById("pass").onclick = pass_;
    };*/

$(function(){
	// 預設顯示第一個 Tab
	var _showTab = 0;
	$('.big_tab').each(function(){
		// 目前的頁籤區塊
		var $tab = $(this);
 
		var $defaultLi = $('ul.tabs li', $tab).eq(_showTab).addClass('active');
		$($defaultLi.find('a').attr('href')).siblings().hide();
 
		// 當 li 頁籤被點擊時...
		$('ul.tabs li', $tab).click(function() {
			// 找出 li 中的 href(#id)
			var $this = $(this),
				_clickTab = $this.find('a').attr('href');
			// 把點擊到的 li 頁籤加上 .active，並把兄弟元素中的 .active 都移除
			$this.addClass('active').siblings('.active').removeClass('active');
			$(_clickTab).stop(false, true).fadeIn().siblings().hide();
 
			return false;
		}).find('a').focus(function(){
			this.blur();
		});
	});
});

//圖片表示

let key1 = 0;
function loadImage1(obj) {
    for (i = 0; i < obj.files.length; i++) {
        var fileReader = new FileReader();
        fileReader.onload = (function (e) {
            var field = document.getElementById("imgPreviewField1");
            var figure = document.createElement("figure");
            var rmBtn = document.createElement("input");
            var img = new Image();
            img.src = e.target.result;
			img.style = "width: 300px;"
            rmBtn.type = "button";
            rmBtn.name = key1;
            rmBtn.value = "削除";
            rmBtn.onclick = (function () {
                var element = document.getElementById("img-" + String(rmBtn.name)).remove();
            });
            figure.setAttribute("id", "img-" + key1);
            figure.appendChild(img);
            figure.appendChild(rmBtn)
            field.appendChild(figure);
            key1++;
        });
        fileReader.readAsDataURL(obj.files[i]);
    }
}

let key = 0;
function loadImage(obj) {
    for (i = 0; i < obj.files.length; i++) {
        var fileReader = new FileReader();
        fileReader.onload = (function (e) {
            var field = document.getElementById("imgPreviewField");
            var figure = document.createElement("figure");
            var rmBtn = document.createElement("input");
            var img = new Image();
            img.src = e.target.result;
			img.style = "min-width: 200px; min-height: 200px; overflow:hidden"
            rmBtn.type = "button";
            rmBtn.name = key1;
            rmBtn.value = "削除";
            rmBtn.onclick = (function () {
                var element = document.getElementById("img-" + String(rmBtn.name)).remove();
            });
            figure.setAttribute("id", "img-" + key1);
            figure.appendChild(img);
            figure.appendChild(rmBtn)
            field.appendChild(figure);
            key1++;
        });
        fileReader.readAsDataURL(obj.files[i]);
    }
}

let key2 = 0;
function loadImage2(obj) {
    for (i = 0; i < obj.files.length; i++) {
        var fileReader = new FileReader();
        fileReader.onload = (function (e) {
            var field = document.getElementById("imgPreviewField2");
            var figure = document.createElement("figure");
            var rmBtn = document.createElement("input");
            var img = new Image();
            img.src = e.target.result;
			img.style = "max-height: 200px;　width:500px; overflow: hidden;"
            rmBtn.type = "button";
            rmBtn.name = key2;
            rmBtn.value = "削除";
            rmBtn.onclick = (function () {
                var element = document.getElementById("img-" + String(rmBtn.name)).remove();
            });
            figure.setAttribute("id", "img-" + key2);
            figure.appendChild(img);
            figure.appendChild(rmBtn)
            field.appendChild(figure);
            key2++;
        });
        fileReader.readAsDataURL(obj.files[i]);
    }
}

function previewvideo(obj)
{
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
}

//pop up////

//モーダル表示
$(".modal-open").modaal({
start_open:false, // ページロード時に表示するか
overlay_close:true,//モーダル背景クリック時に閉じるか
before_open:function(){// モーダルが開く前に行う動作
    $('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
},
after_close:function(){// モーダルが閉じた後に行う動作
    $('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
}
});

/*function pass_() {
    var passcode = prompt("Enter passcode to show email:");
    var info = document.getElementById("info");
    if (passcode == "web"){
        info.style.display = "block";
    }
    else{
        alert("Sorry, incorrect passcode.");
        info.style.display = "none";
    }
}*/