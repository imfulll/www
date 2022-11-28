$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 500;

  // chumdan
  var mainCeo = $(".chumdan").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".chumdan").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".chumdan").removeClass("active");
  }
  // textile
  var mainCeo = $(".textile").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".textile").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".textile").removeClass("active");
  }
});
