$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 500;

  // heavy==============================
  var mainCeo = $(".heavy").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".heavy").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".heavy").removeClass("active");
  }
  // spring
  var mainCeo = $(".spring").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".spring").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".spring").removeClass("active");
  }
  // jhcon
  var mainCeo = $(".jhcon").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".jhcon").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".jhcon").removeClass("active");
  }
});
