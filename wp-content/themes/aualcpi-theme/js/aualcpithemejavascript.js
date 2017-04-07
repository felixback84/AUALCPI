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

//---- inactivar carousel----
$('.carousel').carousel({
    interval: false
}); 

//---- cambiar carousel----
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

//--- apagar botones en carousel perfil--
$('#carousel-dual-perfil').carousel({
    interval: false
}); 
$('#carousel-dual-perfil .left').css("display","none");

$('#carousel-dual-perfil a.right').click(function () {
  $('#carousel-dual-perfil .left').css("display","block");
  $('#carousel-dual-perfil .right').css("display","none");
})
$('#carousel-dual-perfil a.left').click(function () {
  $('#carousel-dual-perfil .right').css("display","block");
  $('#carousel-dual-perfil .left').css("display","none");
})

//---- filtro de investigacion ----
$('.btn-cargar-investigacion').on('click',function(){
    var urlAjax = $(this).data('url');
    filterCiudades = [];
    filterAreas = [];
    filterComentarios = [];
    filterStatus = [];
    $("select[name='filterComentarios[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterComentarios.push($(this).val());
        //alert(filterComentarios);
    });
    
    $("select[name='filterCiudades[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterCiudades.push(parseInt($(this).val()));
    });
    $("select[name='filterAreas[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterAreas.push(parseInt($(this).val()));
    });
    $("select[name='filterStatus[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterStatus.push($(this).val());
        //alert(filterComentarios);
    });
    //alert(checked);
    cargarUsuarios(urlAjax,filterComentarios,filterCiudades, filterAreas,filterStatus);
    cargarCategorias(urlAjax,filterComentarios,filterCiudades, filterAreas,filterStatus);
});
function cargarUsuarios(urlAjax,comentarios,taxonomiaA,taxonomiaB,taxonomiaC){
    $("#the-posts-user").children().remove();
    //mostrar el loader en wordpress
    $('.loaderwp').show();
    $.ajax({
      type: 'POST',
      url: urlAjax,
      data: {
        'action': 'my_get_user',
        'comentarios': comentarios,
        'catA': taxonomiaA,
        'catB': taxonomiaB,
        'catC': taxonomiaC,
      },
      success: function(data, textStatus, XMLHttpRequest)      {
          $("#the-posts-user").append(data);
      },
      complete: function(XMLHttpRequest, textStatus)      {
        $('.loaderwp').hide();
        //--- mostrar 3 post a la vez si el dispositibo es sm o mayor
        $('#carousel-example-generic-autores[data-type="multi"] .item').each(function(){
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
        
      }
    });
  }
function cargarCategorias(urlAjax,comentarios,taxonomiaA,taxonomiaB,taxonomiaC){
    $("#the-posts-inves").children().remove();
    //mostrar el loader en wordpress
    $('.loaderwp').show();
    $.ajax({
      type: 'POST',
      url: urlAjax,
      data: {
        'action': 'my_get_posts',
        'comentarios': comentarios,
        'catA': taxonomiaA,
        'catB': taxonomiaB,
        'catC': taxonomiaC,
      },
      success: function(data, textStatus, XMLHttpRequest)      {
          $("#the-posts-inves").append(data);
      },
      complete: function(XMLHttpRequest, textStatus)      {
        $('.loaderwp').hide();
        //--- mostrar 3 post a la vez si el dispositibo es sm o mayor
        $('#carousel-example-generic-inves[data-type="multi"] .item').each(function(){
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
        
      }
    });
  }

});
