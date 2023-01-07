$(document).ready(function () {
    // Developer Helper js ALIF 
    $('#errorIcon').click(function () {
        
     $('#errorMSGdiv').css({
          'right': '-100%',
          'visibility' : 'hidden'
     });
     });
     $('#successIcon').click(function () {
          $('#successMSGdiv').css({
               'right': '-100%',
               'visibility' : 'hidden'
          });
     });  
});