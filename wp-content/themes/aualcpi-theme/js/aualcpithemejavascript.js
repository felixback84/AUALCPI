jQuery(function ($) {
// console.log( "ready!" );
  //--muestra el contenido de los submenus cuando el mouse pasa sobre el 
	$("nav.menuPrimary ul.nav li").hover(function () { //When trigger is hovered...
        $(this).children("ul.dropdown-menu").slideDown('fast');
    }, function () {
        $(this).children("ul.dropdown-menu").slideUp('slow');
    });
    //--al desplazarse verticalmente define si el menu principal debe fijarse o no 
    var $win = $(window);
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
  //---  popover funciona
    $('[data-toggle="popover"]').popover();   

//- inactivar carousel


  if($(document).width() < 783){
      $('#mostrarCars').removeClass('row');
  }else{
      $('#mostrarCars').addClass('row');
  }


$('.carousel[data-type="multi"] .item').each(function(){
  if($(document).width() > 782){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<1;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    
    next.children(':first-child').clone().appendTo($(this));
  }
}
});

function cambiarNumeracionNoticias(){
  $("#carousel-example-generic-noticias #pagN").text($("#carousel-example-generic-noticias .active").attr("cont"));
}

setInterval(function(){
   cambiarNumeracionNoticias()
},1000);

});
