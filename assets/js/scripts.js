 

    
$(document).ready(function(){

    // AOS Animation
    AOS.init();
    
    // sohag sell record Carousel
  $(".sg-sell-record").owlCarousel({
  	    items:3,
		loop:true,
		autoplay:true,
		dots:true,
		nav:true,
		margin:30,
		 responsiveClass:true,
		 responsive:{
        0:{
            items: 1,
            nav:false,
        },
        576:{
            items: 1,
            nav:false,
        },
        767:{
            items:1,
            nav:false,
        },
        768:{
            items: 2,
            nav:false,
        },
        1000:{
        	items:3
        }
    }
  });

    
    // shanto book Carousel

   $('.book_carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        420:{
            items:2
        },
        768:{
            items:3
        },
        992:{
            items:5
        }
    }
    });


});


// al my bar onscroll 

window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("AL_myBar").style.width = scrolled + "%"; 
} 


// banner images changer js

$(document).ready(function(){
       var bgChnager = $('.sg-banner-area');
       var backgrounds = new Array(
           'url(assets/images/banner/bg-1.jpg)',
           'url(assets/images/banner/bg-2.jpg)',
           'url(assets/images/banner/bg-3.jpg)',
           'url(assets/images/banner/bg-4.jpg)',
           'url(assets/images/banner/bg-5.jpg)'
          
       );
       var current = 0;
       function nextBackground() {
           current++;
           current = current % backgrounds.length;
           bgChnager.css('background-image', backgrounds[current]);
       }
       setInterval(nextBackground, 4000);
       bgChnager.css('background-image', backgrounds[0]);
   });


// scroll function 
$(window).scroll(function(){
    var value=$(this).scrollTop();

    /* if(value>500){
      $('.scrollBtn').fadeIn();
     }else{
      $('.scrollBtn').fadeOut();
     }*/


     if(value>0){
      $('.header-area').addClass('FixedHeader');

     }else{
      $('.header-area').removeClass('FixedHeader')
     }
  })


//===========Shanto magnificPopup
$('.sh_books_popup').magnificPopup({
    type: 'image'
});





 