$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 300;

  // conserve
  var mainCeo = $(".conserve").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".conserve").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".conserve").removeClass("active");
  }
  // develop
  var mainCeo = $(".develop").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".develop").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".develop").removeClass("active");
  }
  // efficient
  var mainCeo = $(".efficient").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".efficient").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".efficient").removeClass("active");
  }
});
