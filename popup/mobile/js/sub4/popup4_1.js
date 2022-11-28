$(document).ready(function () {

  function ok(i) {
    var newContent = "";

    var short = responseObject.popup[i];

    newContent += "<li>";
    newContent += '<div class="frameContainer">';
    newContent +=
      '<iframe src="https://www.youtube.com/embed/' +
      short.url +
      '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';
    newContent += "</div>";
    newContent += "<dl>";
    newContent += "<dt>" + short.dt + "</dt>";
    newContent += "<dd>" + short.dd + "</dd>";
    newContent += "</dl>";
    newContent += "<p>" + short.p + "</p>";
    newContent += '<p class="moreText">' + short.explain + "</p>";
    newContent += '<a href="#" class="moreBtn hide">more</a>';
    newContent += "</li>";

    document.getElementById("popupJs").innerHTML = newContent;
  } //함수 만들어 놓고... i번째 데이터 불러옴

  $(".thumb li a").click(function (e) {
    e.preventDefault();

    var ind = $(this).index(".thumb li a");

    $(".modal").fadeIn("fast");
    $(".youtube ul").fadeIn("slow");
    $(".youtube .popupTop").fadeIn("slow");
    $(".youtube li:eq(" + ind + ")").fadeIn("slow");
    $("body").addClass("on");

    var xhr = new XMLHttpRequest(); // XMLHttpRequest 객체를 생성한다.

    xhr.onload = function () {
      // When readystate changes

      if (xhr.status === 200) {
        // If server status was ok
        responseObject = JSON.parse(xhr.responseText); //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
        // parse() 메소드를 호출하여 자바스크립트 객체배열로 변환한다.
        ok(ind); //ok 함수호출(count = 0일때)
        
        $(".moreBtn").click(function (e) {
          e.preventDefault();
    
          if ($(this).hasClass("hide")) {
            $(".moreText").css("position", "static");
            $(".moreText").css("left", "0");
            $(this).html("less");
            $(this).removeClass("hide");
            $(this).addClass("show");
          } else {
            $(".moreText").css("position", "absolute");
            $(".moreText").css("left", "-1000%");
            $(this).html("more");
            $(this).removeClass("show");
            $(this).addClass("hide");
          }
        });
      }
    };

    xhr.open("GET", "./data/4_1.json", true); // 요청을 준비한다.
    xhr.send(null); // 요청을 전송한다

  });

  $(".closeBtn,.modal").click(function (e) {
    e.preventDefault();

    $(".modal").hide();
    $(".youtube ul").hide();
    $(".youtube li").hide();
    $(".youtube li .frameContainer").html('<iframe src=""></iframe>');
    $(".youtube .popupTop").hide();
    $("body").removeClass("on");
    $(".moreText").slideUp("fast");
    $(".moreBtn").html("more");
    $(".moreBtn").removeClass("show");
    $(".moreBtn").addClass("hide");
  });
});
