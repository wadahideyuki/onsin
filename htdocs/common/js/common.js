$(document).ready(function(){
//ユーザーエージェントによる振分
var userAgent = window.navigator.userAgent.toLowerCase();
var appVersion = window.navigator.appVersion.toLowerCase();
if(userAgent.indexOf("msie") > -1){}
if(userAgent.indexOf("firefox") > -1){}
if(userAgent.indexOf("chrome") > -1){}
if(userAgent.indexOf("iphone") > -1){}
if(userAgent.indexOf("android") > -1){}
if(appVersion.indexOf("msie 7.") != -1){}
var ipad = userAgent.indexOf('ipad') > -1 || userAgent.indexOf('macintosh') > -1 && 'ontouchend' in document;
if(ipad == true){
  //viewportの設定
  $('meta[name="viewport"]').attr("content", "width=1200px");
  $("body").addClass("ipad");
}

//SPのみ
var ua = navigator.userAgent;
if (ua.indexOf('iPhone') > 0 ||ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) || ua.indexOf('Windows Phone') > 0) {
}


//window幅を取得
var winW;
var pc = 768;
var sp = pc - 1;
var rszFlg;
/*---------- リサイズの処理 ----------*/
/*リサイズによるイベントの重ね掛けの回避の為
0 = pc
1 = sp*/
$(window).bind("load resize", function () {
  winW = $(window).width();
  if (winW >= pc) {
    if (rszFlg != 0) {
      //slide
      $(".sldBox .slick-initialized").slick("unslick");

      console.log("pc");
    }
    rszFlg = 0;
  } else { //sp
    if (rszFlg != 1) {
      //slide
      $(".sldBox > ul").slick({
        dots: true,
        arrows: false,
        slidesToShow:1,
        draggable:true,
        slidesToScroll: 1,
        adaptiveHeight: true,
        variableWidth: false,
        centerMode: true,
        centerPadding: 0
      });

      console.log("sp");
    }
    rszFlg = 1;
  }
}); //winBndFncEnd
/*---------- /リサイズの処理 ----------*/


//クリックスクロール
function clkScrl(btn, pos) {
  btn.click(function () {
    var speed = 400; // ミリ秒
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({
      scrollTop: position + pos
    }, speed, "swing");
    return false;
  });
}
clkScrl($("a.clkScrl"), 0);


//toTopボタン
var sclNum = 0;
$(window).scroll(function () {
  sclNum = $(window).scrollTop();
  if (sclNum > 500) {
    $(".toTop").fadeIn("fast");
  } else {
    $(".toTop").fadeOut("fast");
  }
});


/*--------------------
  フォームパーツ
--------------------*/
//selectのplaceholder
$(".u-selectWrap select").change(function(){
  if($(this).prop("selectedIndex") == 0){
    $(this).addClass("ph");
  }else{
    $(this).removeClass("ph");
  }
});


$(".slkSld ul").slick({
	arrows: true,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  variableWidth: true,
  centerMode: true,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 769,
      settings: {
				arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true
      }
    }
  ]
});


//scrolladClass
var scrollAnimationClass = 'set-anime';
var triggerMarginDefault = 50;
var num = 0;

var scrollAnimationElm = document.querySelectorAll('.set-anime');
var scrollAnimationFunc = function () {
  /*属性による個別指定
    scrollAnimationClassで設定したクラス名で属性名が変わる
    例：data-set-anime_margin*/
  var dataMargin = scrollAnimationClass + '_margin';//距離
  var dataTrigger = scrollAnimationClass + '_trigger';//起点になる要素(要素自身とは別の要素を起点にする)
  var dataDelay = scrollAnimationClass + '_delay';//遅延秒数を指定
  for (var i = 0; i < scrollAnimationElm.length; i++) {
    var triggerMargin = triggerMarginDefault;
//    var triggerMargin = window.innerHeight * 0.3;画面下から30%の時
    var elm = scrollAnimationElm[i];
    var showPos = 0;
    if (elm.dataset[dataMargin] != null) {
      triggerMargin = parseInt(elm.dataset[dataMargin]);
    }
    if (elm.dataset[dataTrigger]) {
      showPos = document.querySelector(elm.dataset[dataTrigger]).getBoundingClientRect().top + triggerMargin;
    } else {
      showPos = elm.getBoundingClientRect().top + triggerMargin;
    }
    if (window.innerHeight > showPos) {
      var delay = (elm.dataset[dataDelay]) ? elm.dataset[dataDelay] : 0;
      setTimeout(function (index) {
        scrollAnimationElm[index].classList.add('show-anime');
        var sclNumAnime = $(".show-anime").length;
        $("body").addClass("scl" + sclNumAnime)
      }.bind(null, i), delay);
    }
  }
}
//window.addEventListener('load', scrollAnimationFunc);
$(function () {
  scrollAnimationFunc();
})
window.addEventListener('scroll', scrollAnimationFunc);
window.addEventListener('load', scrollAnimationFunc);


});//DocRdyFncEnd