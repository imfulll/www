$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 500;

  //
  var mainCeo = $(".contentArea ul").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".contentArea ul").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".contentArea ul").removeClass("active");
  }
});
