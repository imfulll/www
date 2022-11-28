$(document).ready(function () {
  
  $("#menu .nav li:eq(0)").addClass("active")
  $("#menu .side").hide();
  
  $("#menu .nav li").click(function(e){
    e.preventDefault();
    
    ind = $(this).index("#menu .nav li");
    // console.log(ind)
    
    $("#menu .nav li").removeClass("active");
    $(this).addClass("active");
    $("#menu > div").hide();
    $("#menu > div:eq(" + ind + ")").show();
  });
  
  // ======================================
  var screenSize = $(window).width(); 

  for(i = 0; i < 5; i++){
    if(screenSize > 500){
      $(".carousel-inner .item:eq(" + i + ") img").attr("src", "./images/slide" + (i+1) + ".jpg");
    } else{
      $(".carousel-inner .item:eq(" + i + ") img").attr("src", "./images/slide" + (i+1) + "_small.jpg");
    }
  }

  $(window).resize(function(){
    var screenSize = $(window).width(); 
    
    for(i = 0; i < 5; i++){
      if(screenSize > 500){
        $(".carousel-inner .item:eq(" + i + ") img").attr("src", "./images/slide" + (i+1) + ".jpg");
      } else{
        $(".carousel-inner .item:eq(" + i + ") img").attr("src", "./images/slide" + (i+1) + "_small.jpg");
      }
    }
  })
  
  
  $("#assurance .assurInner1 .ingredient li:eq(0) a").addClass("on");
  
  if(screenSize > 500){
    $("#assurance .assurInner1 .ingText li:eq(0)").css("display", "flex");
  } else{
    $("#assurance .assurInner1 .ingText li:eq(0)").css("display", "block");
  }
  
  $("#assurance .assurInner1 .ingredient li").click(function(e){
    e.preventDefault();
    
    var ind3 = $(this).index("#assurance .assurInner1 .ingredient li");
    // console.log(ind3);
    
    $("#assurance .assurInner1 .ingredient li a").removeClass("on");
    $(this).find("a").addClass("on");
    $("#assurance .assurInner1 .ingText li").hide();
    
    if(screenSize > 500){
      $("#assurance .assurInner1 .ingText li:eq(" + ind3 + ")").css("display", "flex");
    } else{
      $("#assurance .assurInner1 .ingText li:eq(" + ind3 + ")").css("display", "block");
    }
    
  }
  )

  
// =========================================
  $("#assurance .assurInner2 .btn:eq(0)").addClass("on");
  $("#assurance .assurBtn label").click(function(e){
    e.preventDefault();
    
    ind2 = $(this).index("#assurance .assurBtn label");
    // console.log(ind2);
    
    $("#assurance .assurInner2 .btn").removeClass("on");
    $(this).addClass("on");
    $("#assurance .assurBtn label:eq("+ind2+") input").attr("checked","checked")

    if(ind2 == 0){
      $('.panel-group .panel').show()
    } else if(ind2 == 1){
      $('.panel-group .panel').hide();
      for(i = 0; i <= 2; i++){
        $('.panel-group .panel:eq('+ i +')').show();
      }
    } else if(ind2 == 2){
      $('.panel-group .panel').hide();
      for(i = 3; i <= 5; i++){
        $('.panel-group .panel:eq('+ i +')').show();
      }
    } else if(ind2 == 3){
      $('.panel-group .panel').hide();
      for(i = 6; i <= 7; i++){
        $('.panel-group .panel:eq('+ i +')').show();
      }
    };

  });

});