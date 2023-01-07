$(document).ready(function () {

       var box = $(".box");
       var mainCanvas = $(".main-canvas");
   
       box.draggable({
           containment: mainCanvas,
           helper: "clone",
   
           start: function () {
               $(this).css({
                   opacity: 0
               });
   
               $(".box").css("z-index", "0");
           },
   
           stop: function () {
               $(this).css({
                   opacity: 1
               });
           }
       });
   
       box.droppable({
           accept: box,
   
           drop: function (event, ui) {
               var draggable = ui.draggable;
               var droppable = $(this);
               var dragPos = draggable.position();
               var dropPos = droppable.position();
   
               draggable.css({
                   left: dropPos.left + "px",
                   top: dropPos.top + "px",
                   "z-index": 20
               });
   
               droppable.css("z-index", 10).animate({
                   left: dragPos.left,
                   top: dragPos.top
               });
           }
       });
   
   });