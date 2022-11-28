$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 300;

  //
  var mainCeo = $(".direction ul").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".direction ul").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".direction ul").removeClass("active");
  }

  //
  var mainCeo = $(".system ul").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".system ul").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".system ul").removeClass("active");
  }
});
