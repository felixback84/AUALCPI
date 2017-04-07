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

	$('#upload-button-file').on('click',function(e){
		
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Seleccione los archivos',
			button: {
				text: 'Selecionar archivo'
			},
			multiple: true
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection');
			length = attachment.length;
			console.log(attachment);
			console.log(attachment.models);
			// console.log(JSON.stringify(attachment));
			// console.log(JSON.stringify(length));
			//alert(attachment);
			// for (var i = 0 ; i < length ; i++) {
			// 	url += attachment[i].url
			// 	name += attachment[i].title
			// }
			// console.log(JSON.stringify(url));
			// console.log(JSON.stringify(name));
			// $('#user_meta_files').val(url);
			// $('#user_meta_file_show').val(name);
		});

		mediaUploader.open();
	});

});
