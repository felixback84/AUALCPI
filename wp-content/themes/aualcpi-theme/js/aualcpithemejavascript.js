jQuery(function ($) {
// console.log( "ready!" );

//--muestra el contenido de los submenus cuando el mouse pasa sobre el 
$("nav.menuPrimary ul.nav li").hover(function () { //When trigger is hovered...
      $(this).children("ul.dropdown-menu").slideDown('fast');
  }, function () {
      $(this).children("ul.dropdown-menu").slideUp('slow');
  });
//--anadir icono a menu email
$('ul#menu-email a:first-child').append(' <span class="icon icon-mail3"> </span>');

//--- al desplazarse verticalmente define si el menu principal debe fijarse o no 
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
//---  popover para que funcione
    $('[data-toggle="popover"]').popover();   

//---- inactivar carousel
  if($(document).width() < 783){
      $('#mostrarCars').removeClass('row');
  }else{
      $('#mostrarCars').addClass('row');
  }

//--- mostrar 3 post a la vez si el dispositibo es sm o mayor
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

//--- mostrar 3 post a la vez si el dispositibo es sm o mayor
$('.carousel[data-type="multis"] .item').each(function(){
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
    next.remove();
    //next.next().remove();
  }
}
});

//--- numero de paginacion en slider noticas
function cambiarNumeracionNoticias(){
  $("#carousel-example-generic-noticias #pagN").text($("#carousel-example-generic-noticias .active").attr("cont"));
}

setInterval(function(){
   cambiarNumeracionNoticias()
},1000);


//--- apagar botones en carousel members--
$('#carousel-dual-members').carousel({
    interval: false
}); 
$('#carousel-dual-members .left').css("display","none");

$('#carousel-dual-members a.right').click(function () {
  $('#carousel-dual-members .left').css("display","block");
  $('#carousel-dual-members .right').css("display","none");
})
$('#carousel-dual-members a.left').click(function () {
  $('#carousel-dual-members .right').css("display","block");
  $('#carousel-dual-members .left').css("display","none");
})


});
