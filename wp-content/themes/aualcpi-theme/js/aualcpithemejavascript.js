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
  if( $(document).width() > 767){
     if ($win.scrollTop() <= $pos){
        $('.menuPrimary').removeClass('navbar-fixed-top');
        $('.menuPrimary.navbar-fixed-top').removeClass('espacioObsionalNavFixed');
     }else {
        $('.menuPrimary').addClass('navbar-fixed-top');
        if($('#wpadminbar').length > 0){
            $('.menuPrimary.navbar-fixed-top').addClass('espacioObsionalNavFixed');
            //$('h1').css('color','red');
        }else{
            $('.menuPrimary.navbar-fixed-top').removeClass('espacioObsionalNavFixed');
            //$('h1').css('color','blue');
        }
     }
   }else{
      $('.menuPrimary').removeClass('navbar-fixed-top');
      $('.menuPrimary.navbar-fixed-top').removeClass('espacioObsionalNavFixed');
   }
});

// if($('#wpadminbar')){
//     $('.menuPrimary.navbar-fixed-top').addClass('espacioObsionalNavFixed');
// }else{
//     $('.menuPrimary.navbar-fixed-top').removeClass('espacioObsionalNavFixed');
// }
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
   var tamanioPantalla = $(window).width();
   //alert (tamanioPantalla);
  if( tamanioPantalla > 990){
    //alert (tamanioPantalla);
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
  if((tamanioPantalla < 991) & (tamanioPantalla > 789)){
      //alert (tamanioPantalla);
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
      }
  }
});


//--- numero de paginacion en slider noticas
function cambiarNumeracionNoticias(){
  $("#carousel-example-generic-noticias #pagN").text($("#carousel-example-generic-noticias .active").attr("cont"));
  $("#carousel-example-generic-noticias #pagNC").text($("#carousel-example-generic-noticias .contador").attr("cont"));
}
function cambiarNumeracionPublicaciones(){
  $("#pagP").text($("#carousel-example-generic-publicacion .active").attr("cont"));
  $("#pagPC").text($("#carousel-example-generic-publicacion .contador").attr("cont"));
}
function cambiarNumeracionInvestigaciones(){
  $("#pagI").text($("#carousel-example-generic-investigacion .active").attr("cont"));
  $("#pagIC").text($("#carousel-example-generic-investigacion .contador").attr("cont"));
}
function cambiarNumeracionBecas(){
  $("#pagB").text($("#carousel-example-generic-beca .active").attr("cont"));
  $("#pagBC").text($("#carousel-example-generic-beca .contador").attr("cont"));
}
function cambiarNumeracionAutor(){
  $("#pagA").text($("#carousel-example-generic-autores .active").attr("cont"));
  $("#pagAC").text($("#carousel-example-generic-autores .contador").attr("cont"));
}

setInterval(function(){
   cambiarNumeracionNoticias();
   cambiarNumeracionPublicaciones();
   cambiarNumeracionInvestigaciones();
   cambiarNumeracionBecas();
   cambiarNumeracionAutor();
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
    filterAreasName = [];
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
        filterAreasName.push($(this).text());
    });
    $("select[name='filterStatus[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterStatus.push($(this).val());
        //alert(filterComentarios);
    });
    //alert(checked);
    cargarUsuarios(urlAjax,filterComentarios,filterCiudades, filterAreas,filterStatus,filterAreasName);
    cargarCategorias(urlAjax,filterComentarios,filterCiudades, filterAreas,filterStatus,filterAreasName);
});
function cargarUsuarios(urlAjax,comentarios,taxonomiaA,taxonomiaB,taxonomiaC,AreasName){
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
          if(taxonomiaB != '0'){
            $("#text-investigador").text('Investigadores regionales en '+AreasName);
          }else{
             $("#text-investigador").text('Investigadores regionales'); 
          }
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
function cargarCategorias(urlAjax,comentarios,taxonomiaA,taxonomiaB,taxonomiaC,AreasName){
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
          if(taxonomiaB != '0'){
            $("#text-retos").text('Retos regionales en '+AreasName);
          }else{
             $("#text-retos").text('Retos regionales'); 
          }
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

//---- filtro de movilidad ----
$('.btn-cargar-becas').on('click',function(){
    var urlAjax = $(this).data('url');
    filterCiudades = [];
    filterCategorias = [];
    
    $("select[name='filterCiudades[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterCiudades.push(parseInt($(this).val()));
    });
    $("select[name='filterCategorias[]'] option:selected").each(function ()  {
        //alert(urlAjax);
        filterCategorias.push(parseInt($(this).val()));
    });
    //alert(checked);
    cargarBecas(urlAjax,filterCiudades, filterCategorias);
});

function cargarBecas(urlAjax,taxonomiaA,taxonomiaB){
    $("#the-posts-becas").children().remove();
    //mostrar el loader en wordpress
    $('.loaderwp').show();
    $.ajax({
      type: 'POST',
      url: urlAjax,
      data: {
        'action': 'my_get_becas',
        'catA': taxonomiaA,
        'catB': taxonomiaB,
      },
      success: function(data, textStatus, XMLHttpRequest)      {
          $("#the-posts-becas").append(data);
      },
      complete: function(XMLHttpRequest, textStatus)      {
        $('.loaderwp').hide();
        //--- mostrar 3 post a la vez si el dispositibo es sm o mayor
        $('#carousel-example-generic-beca[data-type="multi"] .item').each(function(){
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
/*-----cerrar y abrir div de busqueda------*/
$('.collapse #btn-abrir').click(function() {
    $(this).parent().parent().parent().removeClass('in');
});

$('.collapse #btn-cerrar').click(function() {
    $(this).parent().parent().parent().removeClass('in');
});

cont=$('#contContribuciones1').val();
$('.contribuciones1').text(cont);
cont=$('#contContribuciones2').val();
$('.contribuciones2').text(cont);
cont=$('#contContribuciones3').val();
$('.contribuciones3').text(cont);
cont=$('#contContribuciones4').val();
$('.contribuciones4').text(cont);
cont=$('#contContribuciones5').val();
$('.contribuciones5').text(cont);
cont=$('#contContribuciones6').val();
$('.contribuciones6').text(cont);


/*----- quitar puntos del slider- plugin------*/
$(".slider-loader-1").css({ 'display': "none" });
$(".huge-it-wrap .huge-it-dot-wrap").css({ 'display': "none" });


});


