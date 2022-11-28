$(document).ready(function () {
  

  // ============business============
  $(".business ul li:eq(0)").fadeIn();
    var businessCnt = 0;
    var businessList = $(".business ul li").length;
    // console.log(businessList);

    //왼쪽/오른쪽 버튼 처리
  $(".btn").click(function (e) {
    e.preventDefault();

    if ($(this).is(".businessLeft")) {
      if (businessCnt == 0) businessCnt = businessList;
      businessCnt--;
    } else if ($(this).is(".businessRight")) {
      if (businessCnt == businessList - 1) businessCnt = -1;
      businessCnt++;
    }
    // console.log(businessCnt);

    $(".business ul li").hide();
    $(".business ul li:eq(" + businessCnt + ")").fadeIn();
  });

  // ============network============
  $(".selectConti").toggle(
    function (e) {
      e.preventDefault();
  
      $(".continentList").slideDown("slow");
      $(this).html('사업장 선택 <i class="fa-solid fa-caret-up"></i>');
    },
    function () {
      $(".continentList").slideUp("fast");
      $(this).html('사업장 선택 <i class="fa-solid fa-caret-down"></i>');
    }
  );

  
});
