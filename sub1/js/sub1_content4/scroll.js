$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 700;

  // 네트워크
  var mainNetwork = $(".network").offset().top - mainScrollGap;
  if (mainScroll > mainNetwork) {
    $(".network").addClass("active");
  } else if (mainScroll < mainNetwork - 200) {
    $(".network").removeClass("active");
  }
});
