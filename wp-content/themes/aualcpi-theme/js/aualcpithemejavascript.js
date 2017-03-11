jQuery(function ($) {
// console.log( "ready!" );
	$("nav.menuPrimary ul.nav li").hover(function () { //When trigger is hovered...
        $(this).children("ul.dropdown-menu").slideDown('fast');
    }, function () {
        $(this).children("ul.dropdown-menu").slideUp('slow');
    });

    var $win = $(window);
  	// definir mediente $pos la altura en píxeles desde el borde superior de la ventana del navegador y el elemento
  	var $pos = 225;
  	$win.scroll(function () {
      if( $(document).width() > 782){
         if ($win.scrollTop() <= $pos)
           $('.menuPrimary').removeClass('navbar-fixed-top');
         else {
           $('.menuPrimary').addClass('navbar-fixed-top');
         }
       }else{
          $('.menuPrimary').removeClass('navbar-fixed-top');
       }
   });

  if($(document).width() < 783){
      $('#mostrarCars').removeClass('row');
  }else{
      $('#mostrarCars').addClass('row');
  }


$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    
    // next.children(':first-child').clone().appendTo($(this));
  }
});

});
