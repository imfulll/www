$(document).ready(function () {
  var screenSize, screenHeight;
  var current = false;

  function screen_size() {
    screenSize = $(window).width(); //스크린의 너비
    screenHeight = $(window).height(); //스크린의 높이

    $("#content").css("margin-top", screenHeight);
    $(".down").css("top", screenHeight/10*7.5);
    $(".videoBox").css({width : screenSize, height : screenHeight})

    if (screenSize > 640 && current == false) {
      $("#videoBG").show();
      $("#videoBG").attr("src", "./images/i_am_iron_man.mp4");
      $("#imgBG").hide();
      current = true;
    }
    if (screenSize <= 640) {
      $("#videoBG").hide();
      $("#videoBG").attr("src", "");
      $("#imgBG").show();
      current = false;
    }
  }

  screen_size(); //최초 실행시 호출

  $(window).resize(function () {
    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    screen_size();
  });

  $(".down").click(function () {
    screenHeight = $(window).height();
    $("html,body").animate({ scrollTop: screenHeight }, 1000);
  });
});
