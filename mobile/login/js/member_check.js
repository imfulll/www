$(document).ready(function () {

  $("#formInput input, .nameInput input, .idInput input").focus(function(){
      $(this).parent().addClass("focus")
      $(this).parent().siblings().addClass("focus")
    });

  $("#formInput input, .nameInput input, .idInput input").blur(function(){
    let value = $(this).val();

    if(!value){
      $(this).parent().removeClass("focus")
      $(this).parent().siblings().removeClass("focus")
    }
  });

});
