$(document).ready(function () {
  $("#content .regular").fadeIn();

  $(".division a").click(function (e) {
    e.preventDefault();

    $(".division a").removeClass("current");
    $(this).addClass("current");

    var ind = $(this).index(".division ul li a");
    console.log(ind);

    if (ind == 0) {
      $("#content .tempo").hide();
      $("#content .regular").fadeIn();
    } else {
      $("#content .regular").hide();
      $("#content .tempo").fadeIn();
    }
  });
});
