$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 500;

  // tns
  var mainCeo = $(".tns").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".tns").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".tns").removeClass("active");
  }
  // info
  var mainCeo = $(".info").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".info").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".info").removeClass("active");
  }
  // galuxialed
  var mainCeo = $(".galuxialed").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".galuxialed").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".galuxialed").removeClass("active");
  }
});
