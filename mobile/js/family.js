$(".family .familyBtn").toggle(
  function (e) {
    e.preventDefault();

    $(".family .familyList").fadeIn();
    $(".family").addClass("clicked");
    $(".family .familyBtn").html(
      'FAMILY SITE <i class="fa-solid fa-chevron-down"></i>'
    );
  },
  function () {
    $(".family .familyList").hide();
    $(".family").removeClass("clicked");
    $(".family .familyBtn").html(
      'FAMILY SITE <i class="fa-solid fa-chevron-up"></i>'
    );
  }
);
