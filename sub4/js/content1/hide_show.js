// JavaScript Document
$(document).ready(function () {
  var article = $(".contentArea .textList"); //모든 질문 답변 리스트
  article.find(".content2").slideUp(500); // 모든 답변 닫아라
  article.find("span").html('<i class="fa-solid fa-angle-down"></i>');

  $(".textList .trigger").click(function (e) {
    // 각각의 질문을 클릭하면
    e.preventDefault(); //<a href="#"> 태그 링크 처리
    var myArticle = $(this).parents(".textList"); //클릭한 해당 list

    if (myArticle.hasClass("hide")) {
      //클릭한 해당 리스트의 상태가 hide냐?? 답변이 닫혀있냐??
      article.find(".content2").slideUp(500); //모든 답변을 닫아라
      article.removeClass("show").addClass("hide"); // 모든 리스트를 hide교체
      article.find("span").html('<i class="fa-solid fa-angle-down"></i>');

      myArticle.removeClass("hide").addClass("show"); // show로 바꾼다
      myArticle.find(".content2").slideDown(500); //해당 리스트의 답변을 열어라
      myArticle.find("span").html('<i class="fa-solid fa-angle-up"></i>');
    } else {
      // 'show' 답변이 열려있냐??
      myArticle.removeClass("show").addClass("hide"); // hide로 바꾼다
      myArticle.find(".content2").slideUp(500); //해당 리스트의 답변을 닫아라
      myArticle.find("span").html('<i class="fa-solid fa-angle-down"></i>');
    }
  });

  //모두 여닫기 처리
  $(".all").toggle(
    function (e) {
      e.preventDefault();
      article.find(".content2").slideDown(500);
      article.removeClass("hide").addClass("show");
      article.find("span").html('<i class="fa-solid fa-angle-up"></i>');
      $(this).html(
        '지배구조헌장 모두 닫기 <i class="fa-solid fa-angle-up"></i>'
      );
    },
    function (e) {
      e.preventDefault();
      article.find(".content2").slideUp(500);
      article.removeClass("show").addClass("hide");
      article.find("span").html('<i class="fa-solid fa-angle-down"></i>');
      $(this).html(
        '지배구조헌장 모두 보기 <i class="fa-solid fa-angle-down"></i>'
      );
    }
  );
});
