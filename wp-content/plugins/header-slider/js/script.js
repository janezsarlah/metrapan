

jQuery(function($){

  //$(".header-slider li").height($(window).height());
  $(".header-slider li").height($(window).height()-280);

  $(window).resize(function(){
    $(".header-slider li").height($(window).height()-280);
  });
  
  $('.header-slider').bxSlider({
    slideMargin:0,
    nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
    prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
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