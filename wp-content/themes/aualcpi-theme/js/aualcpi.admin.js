jQuery(document).ready(function ($) {
//alert( "ready!" );

	var mediaUploader;
	$('#upload-button').on('click',function(e){
		
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			//alert(attachment);
			$('#user_meta_image').val(attachment.url);
			$('#user_meta_image_show').attr('src',attachment.url);
		});

		mediaUploader.open();
	});


});
