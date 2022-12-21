$(document).ready(function () {
  // nav========================================
  $(".menu-trigger").toggle(
    function (e) {
      e.preventDefault();

      $(".mainMenu").css("right", "0").css("opacity", "1");
      $(".menu-trigger").addClass("on");
    },
    function () {
      $(".mainMenu").css("right", "-100%").css("opacity", "0");
      $(".menu-trigger").removeClass("on");
    }
  );

  var current = 0; // 640이상 == 1 / 640이하 == 0
  $(window).resize(function () {
    var screenSize = $(window).width();
    if (screenSize > 1024) {
      $(".mainMenu").css("right", "0").css("opacity", "1");
      $(".menu-trigger").addClass("on");
      current = 1;
    }
    if (current == 1 && screenSize <= 1024) {
      $(".mainMenu").css("right", "-100%").css("opacity", "0");
      $(".menu-trigger").removeClass("on");
      current = 0;
    }
  });

  var $this = $(".menu-trigger");

  $this.on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
  });
});
