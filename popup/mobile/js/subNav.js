$(document).ready(function () {
  $(".subNav > a").toggle(
    function (e) {
      e.preventDefault();

      $(this).parent().find("ul").stop().slideDown("fast");
      $(".subNav").addClass("clicked");
    },
    function (e) {
      e.preventDefault();

      $(this).parent().find("ul").stop().slideUp("fast");
      $(".subNav").removeClass("clicked");
    }
  );
});
