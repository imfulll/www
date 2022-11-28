$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 300;

  // conserve
  var mainCeo = $(".contentText").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".contentText").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".contentText").removeClass("active");
  }
});
