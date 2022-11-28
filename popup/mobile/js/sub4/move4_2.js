
//selectyear toggle=======================
$(document).ready(function () {
  
  $(".snsSelector > a").click(
    function(e){
      e.preventDefault()

    if($(this).hasClass("hide")){
      $(this).removeClass("hide");
      $(this).addClass("show");
      $(".snsSelector ul").stop().slideDown("slow");
      $(".snsSelector > a i").attr("class","fa-solid fa-chevron-up");
    } else{
      $(this).removeClass("show");
      $(this).addClass("hide");
      $(".snsSelector ul").stop().slideUp("fast");
      $(".snsSelector > a i").attr("class","fa-solid fa-chevron-down");
      }
    });

      $(".snsSelector ul li a").click(
        function(e){
          e.preventDefault()
    
        var ind = $(this).index(".snsSelector ul li a");
        var text = $(this).html();
    
        $(".youtubeBox, .blogBox").hide()
        if(ind==0){
          $(".youtubeBox").fadeIn();
          $("#content .snsSelector > a").css("background","#ff0000");
        }else {
          $(".blogBox").fadeIn()
          $("#content .snsSelector > a").css("background","rgba(4, 207, 92, 1)");
          $(".screen .frameContainer").html('<iframe src=""></iframe>');
        }
    
        $(".snsSelector ul").hide();
        $(".snsSelector > a").removeClass("show");
        $(".snsSelector > a").addClass("hide");
        $(".snsSelector > a").html(text + ' <i class="fa-solid fa-chevron-down"></i>');
        
      });


    var value, key;

    function getParams() {

        var url = decodeURIComponent(location.href);

        url = decodeURIComponent(url);

        console.log(url)
        var params = "";
        params = url.substring(url.indexOf("?") + 1, url.length);

        key = params.split("=")[0]; //'num'
        value = params.split("=")[1]; // '1'

        key = Number(value);

      }

      getParams(); //함수호출

    if(key == 1){
      $(".youtubeBox").hide()
      $(".blogBox").fadeIn()
      $("#content .snsSelector > a").css("background","rgba(4, 207, 92, 1)");
      $(".snsSelector > a").html('BLOG <i class="fa-solid fa-chevron-down"></i>');
    } else {
      $(".youtubeBox").fadeIn();
      $("#content .snsSelector > a").css("background","#ff0000");
    }

    // JavaScript Document

  //youtube json 적용=======================================

  $("#content .youtubeBox .thumb li a").click(
    function(e){
      e.preventDefault();

    var ind2 = $(this).index("#content .youtubeBox .thumb li a");

    $("html,body").stop().animate({ scrollTop: 190 }, 1000);
    $("#content .youtubeBox .thumb li").removeClass("current");
    $("#content .youtubeBox .thumb li:eq(" + ind2 + ")").addClass("current");
    

    var xhr = new XMLHttpRequest(); // XMLHttpRequest 객체를 생성한다.

    function ok(i) {
      var newContent = "";

      var short = responseObject.screen[i];

      newContent += "<li>"
      newContent += '<div class="frameContainer">'
      newContent += '<iframe src="https://www.youtube.com/embed/' + short.url + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
      newContent += "</div>"
      newContent += "<dl>"
      newContent += "<dt>" + short.dt + "</dt>"
      newContent += "<dd>" + short.dd1 + "</dd>"
      newContent += "<dd>" + short.dd2 + "</dd>"
      newContent += "</dl>"
      newContent += "</li>"

      document.getElementById("screen").innerHTML = newContent;
    } //함수 만들어 놓고... i번째 데이터 불러옴

    xhr.onload = function () {
      // When readystate changes

      if (xhr.status === 200) {
        // If server status was ok
        responseObject = JSON.parse(xhr.responseText); //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
        // parse() 메소드를 호출하여 자바스크립트 객체배열로 변환한다.
        ok(ind2); //ok 함수호출(count = 0일때)

      }
    }; //처음 페이지 로드

    xhr.open("GET", "./data/4_2.json", true); // 요청을 준비한다.
    xhr.send(null); // 요청을 전송한다
    
  });
});