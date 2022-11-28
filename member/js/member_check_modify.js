$(document).ready(function () {
  //    회원가입 개인정보 동의 ------------------------------------
  $("#content form input").focus(function(){
      $(this).parent().addClass("focus")
      $(this).parent().siblings().addClass("focus")
    });
    
    $("#content form input").blur(function(){
      let value = $(this).val();

      console.log(value);

      if(!value){
        $(this).parent().removeClass("focus")
        $(this).parent().siblings().removeClass("focus")
      }
    });

});
