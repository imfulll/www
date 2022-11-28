$(".video .videoBig li:first").fadeIn("fast");
$(".video .thumb li:eq(0)").css("border-color", "rgba(47, 71, 152, 1)");
$(".video .videoBig li a").html('more <i class="fa-solid fa-plus"></i>');

$(".video .thumb li").click(function (e) {
  e.preventDefault();
  var ind = $(this).index(".video .thumb li"); // 0 1 2 3

  $(".video .videoBig li").hide();
  $(".video .videoBig li dd").slideUp("fast");
  $(".video .videoBig li a").html('more <i class="fa-solid fa-plus"></i>');
  $(".video .videoBig li:eq(" + ind + ")").fadeIn("fast");

  $(".video .thumb li").css("border-color", "#fff");
  $(this).css("border-color", "rgba(47, 71, 152, 1)");
});

$(".video .videoBig li a").toggle(
  function (e) {
    e.preventDefault();

    $(this).prev().find("dd").slideDown("slow");
    $(this).html('less <i class="fa-solid fa-minus"></i>');
  },
  function () {
    $(this).prev().find("dd").slideUp("fast");
    $(this).html('more <i class="fa-solid fa-plus"></i>');
  }
);
