$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  // var mainScrollGap = $(window).height() / 2;
  var mainScrollGap = $(window).height() - 500;

  // tnc==================================
  var mainCeo = $(".tnc").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".tnc").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".tnc").removeClass("active");
  }
  // sebit
  var mainCeo = $(".sebit").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".sebit").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".sebit").removeClass("active");
  }
  // gjcold
  var mainCeo = $(".gjcold").offset().top - mainScrollGap;
  if (mainScroll > mainCeo) {
    $(".gjcold").addClass("active");
  } else if (mainScroll < mainCeo - 300) {
    $(".gjcold").removeClass("active");
  }
});
