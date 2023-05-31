$(document).ready(function(){
    $('.menu-toggle').on('click',function(){
 $('.nav').toggleClass('showing');
 $('.nav .un').toggleClass('showing');
    });
 });

 
 $('.post-wrapper').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 700,
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
 
  })


  

 
     
