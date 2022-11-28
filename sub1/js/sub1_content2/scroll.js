$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 200;

  // tab
  var mainCeo = $(".tabs").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".tabs").addClass("active");
  } else if (mainScroll < mainCeo - 200) {
    $(".tabs").removeClass("active");
  }
});
