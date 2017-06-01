jQuery(document).ready(function($)
{	
var url  = $(".patch").val();
//alert(url);
//url = 'http://localhost/AUALCPI/AUALCPI/wp-content/themes/aualcpi-theme'; 
$(".tfdate").datepicker({
    dateFormat: 'M d, yy',
    showOn: 'button',
    buttonImage: url+'/images/icon-datepicker.png',
    buttonImageOnly: true,
    numberOfMonths: 1

    });
});