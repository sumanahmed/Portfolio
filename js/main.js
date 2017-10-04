(function ($) {
	"use strict";

    jQuery(document).ready(function($){

        /*scroll top js code*/
           var scrollTop = $(".scrollTop");

          $(window).scroll(function() {
            // declare variable
            var topPos = $(this).scrollTop();

            // if user scrolls down - show scroll to top button
            if (topPos > 100) {
              $(scrollTop).css("opacity", "1");

            } else {
              $(scrollTop).css("opacity", "0");
            }

          }); // scroll END

          //Click event to scroll to top
          $('#stop').click(function() {
            $('html, body').animate({
              scrollTop: 0
            }, 800);
            return false;

          });
        /*scroll top js code end*/


        /*stick menu js code start*/
        var s = $("#sticker");
        var pos = s.position();
        $(window).scroll(function(){
          var windowpos = $(window).scrollTop();
          if(windowpos >= pos.top){
            s.addClass("stick");
          }else{
            s.removeClass("stick");
          }
        });

        /*stick menu js code end*/




        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");
        
        $('[data-toggle="tooltip"]').tooltip();

         

        //jquery smooth scroll
        /*$('.smooth-menu a').bind('click', function(event){
            var $anchor= $(this);
            var headerH = '60';
            $('html, body').stop().animate({
                scrollTop:$($anchor.attr('href')).offset().top - headerH + "px"
            }, 1200, 'easeInOutExpo');

            event.preventDefault();
        });*/


        $('body').scrollspy({ 
            target: '.navbar-collapse',
            offset: 95
         });


        //$('.parallax-bg').scrolly({bgParallax: true});





    });


   



}(jQuery));	



/******* isotope activator code ***********/
//Active siotope with JQuery code:
$('.main-iso').isotope({
  // options
  itemSelector: '.item',
  layoutMode: 'fitRows'
});

//Isotope click function
$('.iso-nav ul li').click(function(){
    $('.iso-nav ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.main-iso').isotope({
        filter: selector
    });
    return false;
});

  new WOW().init();  