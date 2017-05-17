

jQuery(function($){

  //$(".header-slider li").height($(window).height());
  if (window.innerHeight > 650) {

    $(".header-slider li").height($(window).height()-280);
  } else {
    $(".header-slider li").height($(window).height()-200);
  }

  $(window).resize(function(){
    if (window.innerHeight > 650) {
      $(".header-slider li").height($(window).height()-280);
    } else {
      $(".header-slider li").height($(window).height()-200);
    }
  });
  
  $('.header-slider').bxSlider({
    slideMargin:0,
    nextText: '<div class="con controleright"></div>',
    prevText: '<div class="con controleleft"></div>',
    pager: false,
    //slideWidth: $(window).width(),
    responsive: true,
    touchEnabled: true,
    controls: true,
    /*
    mode: "fade",
    speed: 1000,
    */
    
  });
});