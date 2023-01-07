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