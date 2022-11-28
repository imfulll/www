// JavaScript Document
$(document).ready(function () {
  var title = $(".contentText li"); //모든 li들..(질문답변들...)
  // $(".faq li:eq(0) .a").slideDown(100);  //첫번째 오픈시작

  $(".contentText li h3 a").click(function (e) {
    //각각의 질문을 클릭하면
    e.preventDefault();

    var content = $(this).parents(".contentText li"); //클릭한 해당 메뉴에 li(리스트)

    if (content.hasClass("hide")) {
      //클릭한 해당 리스트가 닫혀있냐??
      title.removeClass("show").addClass("hide");
      title.find("div").slideUp(100);
      title.find("i").attr("class", "fa-solid fa-chevron-down");
      title.find("a").css("border-bottom", "1px solid #ccc");

      content.removeClass("hide").addClass("show");
      content.find("div").slideDown(100);
      content.find("i").attr("class", "fa-solid fa-chevron-up");
      content.find("a").css("border-bottom", "1px solid rgba(0, 0, 0, 0)");
    } else {
      //클릭한 해당 리스트가 열려있냐?? (show)
      content.removeClass("show").addClass("hide"); //클래스 hide로 바꾼다
      content.find("div").slideUp(100); //해당 리스트의 답변을 닫아라~~~
      $(this).find("i").attr("class", "fa-solid fa-chevron-down");
      $(this).css("border-bottom", "1px solid #ccc");
    }
  });

  //모두여닫기
  $(".all").toggle(
    function (e) {
      e.preventDefault();
      title.find("div").slideDown(100);
      title.removeClass("hide").addClass("show");
      title.find("i").attr("class", "fa-solid fa-chevron-up");
      title.find("a").css("border-bottom", "1px solid rgba(0, 0, 0, 0)");
      title.find("a").css("border-top", "1px solid #ccc");
      //$(this).text('모두닫기');
      $(this).text("모두 닫기");
    },
    function (e) {
      title.find("div").slideUp(100);
      title.removeClass("show").addClass("hide");
      title.find("i").attr("class", "fa-solid fa-chevron-down");
      title.find("a").css("border-bottom", "1px solid #ccc");
      title.find("a").css("border-top", "1px solid rgba(0, 0, 0, 0)");
      //$(this).text('모두열기');
      $(this).text("모두 열기");
    }
  );
});
