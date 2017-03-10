jQuery(function ($) {
// console.log( "ready!" );
	$("nav.menuPrimary ul.nav li").hover(function () { //When trigger is hovered...
        $(this).children("ul.dropdown-menu").slideDown('fast');
    }, function () {
        $(this).children("ul.dropdown-menu").slideUp('slow');
    });

});
