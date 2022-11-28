$(document).ready(function () {

  var $this = $(".menu-trigger");

  $this.on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
  });

  // $(window).on('scroll',function(){}); : 스크롤의 거리가 발생하면
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop(); //스크롤의 거리를 리턴하는 함수 // scrollTop : 내려온 거리
    // console.log(scroll);
    var imageUrl = "../images/footer_logo1.png";

    if (scroll > 100) {
      //스크롤100까지 내리면
      $("#headerArea").css("background", "#fff").addClass("on");
    } else {
      //스크롤 내리기 전 디폴트(마우스올리지않음)
      //마우스가 헤더에 안오버 했을 때 투명
      $("#headerArea").css("background", "none");
      $("#headerArea").removeClass("on");
    }
  });

  $(".menu-trigger").toggle(
    function (e) {
      e.preventDefault();

      $("#gnb").fadeIn();
      $(".menu-trigger").addClass("on");
      $(".menu-trigger span").addClass("on");
    },
    function () {
      $("#gnb").fadeOut();
      $(".menu-trigger").removeClass("on");
      $(".menu-trigger span").removeClass("on");
      $(".depth1 ul").slideUp();
      $(".depth1 ul").removeClass("show").addClass("hide");
      $(".depth1 h3 a i").css("transform", "rotate(0)");
    }
  );

  $(".depth1 h3 a").click(function (e) {
    e.preventDefault();

    var current = $(this).parents(".depth1").find("ul");

    if (current.hasClass("hide")) {
      $(".depth1 h3 a").parents(".depth1").find("ul").slideUp();
      $(".depth1 ul").removeClass("show").addClass("hide");
      $(current).removeClass("hide").addClass("show");
      $(current).slideDown();
      $(".depth1 h3 a").find("i").css("transform", "rotate(0)");
      $(this).find("i").css("transform", "rotate(180deg)");
    } else {
      $(current).removeClass("show").addClass("hide");
      $(current).slideUp();
      $(this).find("i").css("transform", "rotate(0)");
    }
  });

});