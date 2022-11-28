// JavaScript Document

$(document).ready(function () {
  // var cnt = 3; //탭메뉴 개수 ***
  // var cnt = $(".tabs .tab_menu li").size();

  $(".tabs .historyList:eq(0)").fadeIn(); // 첫번째 탭 내용만 열어라
  $(".tabs .tab1").css("color", "rgba(47, 71, 152, 1)"); //첫번째 탭메뉴 활성화
  $(".tabs .tab1")
    .next()
    .css("border", "0")
    .css("background", "rgba(47, 71, 152, 1)");
  //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***
  // hover
  $(".tab_menu li").hover(
    function () {
      $(this).find(".tab").css("transform", "scale(1.1)");
      $(this).children("span").css("border-width", "7px");
    },
    function () {
      $(this).find(".tab").css("transform", "scale(1)");
      $(this).children("span").css("border-width", "3px");
    }
  );

  //click
  //each를 안쓰고 index로만 처리
  $(".tabs .tab").click(function (e) {
    e.preventDefault(); // <a> href="#" 값을 강제로 막는다

    var ind = $(this).index(".tabs .tab"); // 클릭시 해당 index를 뽑아준다

    $(".tabs .historyList").hide(); //모든 탭내용을 안보이게...
    $(".tabs .historyList:eq(" + ind + ")").fadeIn(); //클릭한 해당 탭내용만 보여라

    $(".tab").css("color", "#666").css("transform", "scale(1)"); //모든 탭메뉴를 비활성화
    $(".tab").next().css("border", "3px solid #666").css("background", "#fff"); //모든 탭메뉴를 비활성화
    $(this).css("color", "rgba(47, 71, 152, 1)"); // 클릭한 해당 탭메뉴만 활성화
    $(this).next().css("border", "0").css("background", "rgba(47, 71, 152, 1)"); // 클릭한 해당 탭메뉴만 활성화
  });
});

// //지도페이지 추가
// $(window).on("scroll", function () {
//   var scroll = $(window).scrollTop();

//   if (scroll > 0) {
//     $(".tabs .contlist").hide();
//   }
// });
