$(document).ready(function () {
        // mobile menu js 
     $('#AL_show_btn').click(function () {
          $('#mobile_menu').css({
               'left':'0',
          });
     })
     $('#AL_close_btn').click(function () {
          $('#mobile_menu').css({
               'left':'-100%',
          });
     })
     // mega menu showing 
     $('#megaToggle1').click(function () {
          $('#megaMenu1').slideToggle('slow');
          $(this).toggleClass('ALtoggleClass');
          $('#AL_chavron1').toggleClass('ALchavronClass');
          return false;
     })

     $('#megaToggle2').click(function () {
          $('#megaMenu2').slideToggle('slow');
          $(this).toggleClass('ALtoggleClass');
          $('#AL_chavron2').toggleClass('ALchavronClass');
          return false;
     })
});