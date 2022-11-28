$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 600;

  // ceo
  var mainCeo = $(".ceo").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".ceo").addClass("active");
  } else if (mainScroll < mainCeo - 200) {
    $(".ceo").removeClass("active");
  }

  //profile
  var mainProfile = $(".profile").offset().top - mainScrollGap;
  if (mainScroll > mainProfile) {
    $(".profile").addClass("active");
  } else if (mainScroll < mainProfile - 400) {
    $(".profile").removeClass("active");
  }
});
